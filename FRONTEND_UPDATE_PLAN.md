# Frontend Layout Update Script

## Issues Found:
1. Pages use `@section('content')` but master.blade.php uses `@yield('main_content')`
2. Some pages have `@include('front.layout.navigation')` which doesn't exist
3. Some pages have inline navigation code that should be removed
4. Routes in pages use `url()` or old route names instead of `route('front.*')`

## Files That Need Updates:

### Files with `@section('content')` - Change to `@section('main_content')`:
- home.blade.php
- speakers.blade.php (also has inline navigation)
- contact.blade.php
- accommodations.blade.php
- photo_gallery.blade.php
- video_gallery.blade.php
- faq.blade.php
- testimonials.blade.php
- pricing.blade.php
- buy_ticket.blade.php
- bkash_payment.blade.php
- nagad_payment.blade.php
- bank.blade.php
- term.blade.php
- privacy.blade.php
- sponsors.blade.php
- sponsor.blade.php
- speaker.blade.php
- schedule.blade.php
- post.blade.php (blog)
- organisers.blade.php
- organiser.blade.php

### Files with `@include('front.layout.navigation')` - Remove this line:
- home.blade.php
- contact.blade.php
- bkash_payment.blade.php
- nagad_payment.blade.php
- bank.blade.php
- term.blade.php
- privacy.blade.php

### Files with Inline Navigation - Remove navigation code:
- speakers.blade.php (lines 5-56)

## Manual Steps Required:

1. Replace `@section('content')` with `@section('main_content')` in all files
2. Remove `@include('front.layout.navigation')` lines
3. Remove inline navigation HTML code
4. Ensure `@endsection` closes the main_content section
5. Update routes to use `route('front.*')` format

## Priority Files to Update First:
1. home.blade.php (most important)
2. speakers.blade.php
3. contact.blade.php
4. pricing.blade.php
5. blog.blade.php
