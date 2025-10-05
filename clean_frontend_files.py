import re
import os

# List of files to process
files_to_clean = [
    'photo_gallery.blade.php',
    'video_gallery.blade.php',
    'pricing.blade.php',
    'buy_ticket.blade.php',
    'sponsor.blade.php',
    'sponsors.blade.php',
    'speaker.blade.php',
    'post.blade.php',
    'schedule.blade.php',
    'organisers.blade.php',
    'organiser.blade.php',
    'blog.blade.php',
    'faq.blade.php',
    'testimonials.blade.php'
]

base_path = r'resources\views\front'

for filename in files_to_clean:
    filepath = os.path.join(base_path, filename)

    if not os.path.exists(filepath):
        print(f"❌ File not found: {filename}")
        continue

    print(f"Processing: {filename}")

    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Remove inline navigation block
    # Pattern matches from <div class="container main-menu" to its closing </div></div></div>
    nav_pattern = r'<div class="container main-menu"[^>]*>.*?</div>\s*</div>\s*</div>\s*\n*'
    content = re.sub(nav_pattern, '', content, flags=re.DOTALL)

    # Remove duplicate @extends and @section lines if they exist
    # Find if there's duplicate @extends('front.layout.master')
    if content.count("@extends('front.layout.master')") > 1:
        # Keep only the first occurrence
        parts = content.split("@extends('front.layout.master')", 2)
        if len(parts) > 2:
            content = "@extends('front.layout.master')" + parts[1] + parts[2]

    # Remove duplicate @section('main_content') if exists
    if content.count("@section('main_content')") > 1:
        parts = content.split("@section('main_content')", 2)
        if len(parts) > 2:
            content = parts[0] + "@section('main_content')" + parts[2]

    # Fix broken lines like ")ends('front.layout.master')"
    content = re.sub(r'\)ends\(["\']front\.layout\.master["\']\)', ')', content)

    # Add title section if missing
    if "@section('title'" not in content:
        # Extract page name from filename
        page_name = filename.replace('.blade.php', '').replace('_', ' ').title()
        # Insert after @extends line
        content = content.replace(
            "@extends('front.layout.master')",
            f"@extends('front.layout.master')\n\n@section('title', '{page_name} | SingleEvent')"
        )

    # Write back
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

    print(f"✅ {filename} cleaned successfully")

print("\n✨ All files processed!")
