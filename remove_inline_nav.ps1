# PowerShell script to remove inline navigation from frontend blade files
# This script removes the entire navigation block from files

$files = @(
    "accommodations.blade.php",
    "photo_gallery.blade.php",
    "video_gallery.blade.php",
    "pricing.blade.php",
    "buy_ticket.blade.php",
    "sponsor.blade.php",
    "sponsors.blade.php",
    "speaker.blade.php",
    "post.blade.php",
    "schedule.blade.php",
    "organisers.blade.php",
    "organiser.blade.php",
    "blog.blade.php",
    "faq.blade.php",
    "testimonials.blade.php"
)

foreach ($fileName in $files) {
    $filePath = "resources\views\front\$fileName"

    if (Test-Path $filePath) {
        Write-Host "Processing: $fileName" -ForegroundColor Cyan

        $content = Get-Content $filePath -Raw

        # Remove the entire navigation block (from <div class="container main-menu" to </div></div>)
        $pattern = '<div class="container main-menu"[^>]*>.*?</div>\s*</div>\s*</div>\s*(?=<div class="common-banner"|<section|<div class="[^"]*section)'

        if ($content -match $pattern) {
            $content = $content -replace $pattern, ''
            Set-Content -Path $filePath -Value $content -NoNewline
            Write-Host "  - Removed inline navigation" -ForegroundColor Green
        } else {
            Write-Host "  - Navigation pattern not found or already removed" -ForegroundColor Yellow
        }
    } else {
        Write-Host "File not found: $fileName" -ForegroundColor Red
    }
}

Write-Host "`nAll files processed!" -ForegroundColor Green
