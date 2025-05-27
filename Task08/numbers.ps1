function Show-Date_Info {
    $today = Get-Date
    $day = $today.Day
    $month = $today.Month
    $year = $today.Year

    $baseUrl = "http://numbersapi.com"

    $facts = @(
        "$baseUrl/$month/$day/date",
        "$baseUrl/$day",
        "$baseUrl/$year/year"
    )
    Write-Host "Сегодня: $day.$month.$year"
    foreach ($url in $facts) {
        try {
            $response = Invoke-WebRequest -Uri $url -UseBasicParsing
            Write-Host $response.Content -ForegroundColor Cyan
        } catch {
            Write-Host "Не удалось получить данные с $url" -ForegroundColor Red
        }
    }
}

Show-Date_Info