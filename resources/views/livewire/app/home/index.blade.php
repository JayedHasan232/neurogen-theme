@push('metainfo')
    <!-- Primary Meta Tags -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="title" content="Neurogen: Preview, Edit and Generate">
    <meta name="description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta name="keywords" content="">

    <!-- Open Graph / Facebook -->
    <meta name="fb:app_id" content="" />
    <meta name="og:type" content="website">
    <meta name="og:site_name" content="neurogenbd.com" />
    <meta name="og:locale" content="en_US" />
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:title" content="Neurogen: Preview, Edit and Generate">
    <meta name="og:description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta name="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta name="twitter:site" content="@NeuroGen.Technologies" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Neurogen: Preview, Edit and Generate">
    <meta name="twitter:description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta name="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

@endpush



@section('content')

    @livewire('app.home.slider')
    @livewire('app.home.circle-of-care')
    @livewire('app.home.appointment')
    @livewire('app.home.doctors')
    {{--@livewire('app.home.statistics')--}}
    @livewire('app.home.faq')
    @livewire('app.contact.map')

@endsection