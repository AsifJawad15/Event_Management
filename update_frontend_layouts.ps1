# PowerShell script to update frontend blade files
# Run this from the project root: powershell -ExecutionPolicy Bypass -File update_frontend_layouts.ps1

$files = Get-ChildItem -Path "resources\views\front\*.blade.php" -File

foreach ($file in $files) {
    Write-Host "Processing: $($file.Name)" -ForegroundColor Cyan

    $content = Get-Content $file.FullName -Raw
    $modified = $false

    # Replace @section('content') with @section('main_content')
    if ($content -match "@section\('content'\)") {
        $content = $content -replace "@section\('content'\)", "@section('main_content')"
        Write-Host "  - Replaced @section('content') with @section('main_content')" -ForegroundColor Green
        $modified = $true
    }

    # Remove @include('front.layout.navigation') lines
    if ($content -match "@include\('front\.layout\.navigation'\)") {
        $content = $content -replace "\s*@include\('front\.layout\.navigation'\)\s*", "`n"
        Write-Host "  - Removed @include('front.layout.navigation')" -ForegroundColor Green
        $modified = $true
    }

    # Save the file if modified
    if ($modified) {
        Set-Content -Path $file.FullName -Value $content -NoNewline
        Write-Host "  - File updated successfully!" -ForegroundColor Yellow
    } else {
        Write-Host "  - No changes needed" -ForegroundColor Gray
    }
}

Write-Host "`nAll files processed!" -ForegroundColor Green
Write-Host "`nNOTE: You still need to manually remove inline navigation code from speakers.blade.php" -ForegroundColor Red
