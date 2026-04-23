$files = Get-ChildItem -Path ".\" -Filter "*.html"
foreach ($file in $files) {
    $content = Get-Content -Raw -Path $file.FullName -Encoding UTF8
    $newContent = $content.Replace("â–¼", "▼")
    Set-Content -Path $file.FullName -Value $newContent -Encoding UTF8
}
