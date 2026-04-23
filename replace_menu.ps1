$replacement = Get-Content -Raw -Path "new_menu.txt"
$files = Get-ChildItem -Path ".\" -Filter "*.html"

foreach ($file in $files) {
    $content = Get-Content -Raw -Path $file.FullName
    # Regular expression to match from <div class="nav-menu" id="nav-menu"> to </nav>
    # (?s) makes the dot match newlines
    $newContent = $content -replace '(?s)<div class="nav-menu" id="nav-menu">.*?</nav>', $replacement
    Set-Content -Path $file.FullName -Value $newContent -Encoding UTF8
    Write-Output "Updated $($file.Name)"
}
