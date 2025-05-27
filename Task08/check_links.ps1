$shell = New-Object -ComObject WScript.Shell
$desktopPath = [Environment]::GetFolderPath("Desktop")
$badLinksDir = Join-Path $desktopPath "BadLinks"

if (-not (Test-Path $badLinksDir)) {
    New-Item -ItemType Directory -Path $badLinksDir | Out-Null
}

Get-ChildItem -Path $desktopPath -Filter *.lnk | ForEach-Object {
    $shortcut = $shell.CreateShortcut($_.FullName)
    if (-not (Test-Path $shortcut.TargetPath)) {
        Move-Item -Path $_.FullName -Destination $badLinksDir
    }
}
