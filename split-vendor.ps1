# Script para dividir vendor en 4 partes para upload a InfinityFree

$vendorPath = "C:\Proyectos\laravel\blog\vendor"
$outputPath = "C:\Proyectos\laravel\blog"

Write-Host "Iniciando compresion de vendor en 4 partes..." -ForegroundColor Green

# Parte 1: bin, brick, carbonphp, composer, dflydev, doctrine, dragonmantank, egulias, fruitcake
Write-Host "`n=== Creando vendor-part1 ===" -ForegroundColor Cyan
$paths1 = @("bin", "brick", "carbonphp", "composer", "dflydev", "doctrine", "dragonmantank", "egulias", "fruitcake") | ForEach-Object { Join-Path $vendorPath $_ }
Compress-Archive -Path $paths1 -DestinationPath "$outputPath\vendor-part1.zip" -Force
$size1 = (Get-Item "$outputPath\vendor-part1.zip").Length / 1MB
Write-Host "vendor-part1.zip creado ($([Math]::Round($size1, 2)) MB)" -ForegroundColor Green

# Parte 2: graham-campbell, guzzlehttp, intervention, laravel, league, monolog, nesbot, nette
Write-Host "`n=== Creando vendor-part2 ===" -ForegroundColor Cyan
$paths2 = @("graham-campbell", "guzzlehttp", "intervention", "laravel", "league", "monolog", "nesbot", "nette") | ForEach-Object { Join-Path $vendorPath $_ }
Compress-Archive -Path $paths2 -DestinationPath "$outputPath\vendor-part2.zip" -Force
$size2 = (Get-Item "$outputPath\vendor-part2.zip").Length / 1MB
Write-Host "vendor-part2.zip creado ($([Math]::Round($size2, 2)) MB)" -ForegroundColor Green

# Parte 3: nikic, nunomaduro, phpoption, psr, psy, ralouphie, ramsey, symfony
Write-Host "`n=== Creando vendor-part3 ===" -ForegroundColor Cyan
$paths3 = @("nikic", "nunomaduro", "phpoption", "psr", "psy", "ralouphie", "ramsey", "symfony") | ForEach-Object { Join-Path $vendorPath $_ }
Compress-Archive -Path $paths3 -DestinationPath "$outputPath\vendor-part3.zip" -Force
$size3 = (Get-Item "$outputPath\vendor-part3.zip").Length / 1MB
Write-Host "vendor-part3.zip creado ($([Math]::Round($size3, 2)) MB)" -ForegroundColor Green

# Parte 4: tijsverkoyen, vlucas, voku, webmozart, y archivos root
Write-Host "`n=== Creando vendor-part4 ===" -ForegroundColor Cyan
$paths4 = @("tijsverkoyen", "vlucas", "voku", "webmozart") | ForEach-Object { Join-Path $vendorPath $_ }
$paths4 += Get-ChildItem $vendorPath -File | Where-Object { $_.Extension -eq ".php" -or $_.Extension -eq ".json" } | ForEach-Object { $_.FullName }
Compress-Archive -Path $paths4 -DestinationPath "$outputPath\vendor-part4.zip" -Force
$size4 = (Get-Item "$outputPath\vendor-part4.zip").Length / 1MB
Write-Host "vendor-part4.zip creado ($([Math]::Round($size4, 2)) MB)" -ForegroundColor Green

Write-Host "`n=== RESUMEN ===" -ForegroundColor Green
Get-ChildItem $outputPath -Filter "vendor-part*.zip" | ForEach-Object {
    $size = $_.Length / 1MB
    Write-Host "$($_.Name): $([Math]::Round($size, 2)) MB"
}

$totalSize = (Get-ChildItem $outputPath -Filter "vendor-part*.zip" | Measure-Object -Property Length -Sum).Sum / 1MB
Write-Host "`nTamaño total: $([Math]::Round($totalSize, 2)) MB" -ForegroundColor Yellow
Write-Host "Listo para subir a InfinityFree" -ForegroundColor Green
