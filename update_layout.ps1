$index = Get-Content -Raw -Path "index.html"

# Extract header
if ($index -match '(?s)<header class="main-header">.*?</header>') {
    $newHeader = $Matches[0]
} else {
    Write-Error "Could not find main-header in index.html"
    exit
}

# Extract footer
if ($index -match '(?s)<footer class="footer">.*?</footer>') {
    $newFooter = $Matches[0]
}

$files = Get-ChildItem -Filter "*.html" | Where-Object { $_.Name -ne "index.html" }

foreach ($file in $files) {
    $content = Get-Content -Raw -Path $file.FullName
    
    # 1. Remove any legacy navbars FIRST (this prevents deleting the new navbar later)
    $content = [regex]::Replace($content, '(?s)<nav class="navbar">.*?</nav>', "")
    
    # 2. Replace the main header
    $content = [regex]::Replace($content, '(?s)<header class="(topbar|main-header)">.*?</header>', $newHeader.Replace('$', '$$'))
    
    # 3. Replace footer
    if ($newFooter) {
        $content = [regex]::Replace($content, '(?s)<footer class="footer">.*?</footer>', $newFooter.Replace('$', '$$'))
    }
    
    # Clean up double headers if any
    $content = $content -replace '(?s)<header class="main-header">\s*<header class="main-header">', '<header class="main-header">'
    $content = $content -replace '(?s)</header>\s*</header>', '</header>'

    Set-Content -Path $file.FullName -Value $content -Encoding UTF8
    Write-Output "Synced $($file.Name)"
}
