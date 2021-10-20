<nav class="accordion sidebar" id="sidebarAccordion">
    <ul class="sb-list">
        <li class="sb-item" id="items">
            <a href="{{ route('admin.dashboard') }}" class="sb-link active">Dashboard</a>
        </li>

        <!-- Team -->
        <li class="sb-item">
            <a href="{{ route('admin.team.create') }}" class="sb-link">Team</a>
        </li>

        <!-- Services -->
        <li class="sb-item">
            <a href="{{ route('admin.service.create') }}" class="sb-link">Services</a>
        </li>

        <!-- Slider -->
        <li class="sb-item">
            <a href="{{ route('admin.slider.create') }}" class="sb-link">Slider</a>
        </li>

        <!-- OpeningHours -->
        <li class="sb-item">
            <a href="{{ route('admin.opening-hour') }}" class="sb-link">Opening Hours</a>
        </li>

        <!-- Appoitment -->
        <li class="sb-item">
            <a href="{{ route('admin.appoitment') }}" class="sb-link">Appoitments</a>
        </li>

        <!-- Blog -->
        <li class="sb-item" id="blog">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">Blog</a>
            <ul class="collapse sbc-list" id="collapseBlog" aria-labelledby="headingBlog" data-bs-parent="#sidebarAccordion">
                <li class="sbc-item"><a href="{{ route('admin.blog.create') }}" class="sbc-link">Post</a></li>
                <li class="sbc-item"><a href="{{ route('admin.blog.category.create') }}" class="sbc-link">Category</a></li>
                <li class="sbc-item"><a href="{{ route('admin.blog.sub-category.create') }}" class="sbc-link">Sub Category</a></li>
            </ul>
        </li>

        <!-- FAQs -->
        <li class="sb-item">
            <a href="{{ route('admin.faq.create') }}" class="sb-link">FAQs</a>
        </li>

        <!-- Gallery -->
        <li class="sb-item">
            <a href="{{ route('admin.gallery.create') }}" class="sb-link">Gallery</a>
        </li>

        <!-- Career -->
        <li class="sb-item" id="career">
            <a class="sb-link" data-bs-toggle="collapse" data-bs-target="#collapseCareer" aria-expanded="true" aria-controls="collapseCareer">Career</a>
            <ul class="collapse sbc-list" id="collapseCareer" aria-labelledby="headingCareer" data-bs-parent="#sidebarAccordion">
                <a href="{{ route('admin.career.create') }}" class="sb-link">Job Post</a>
            </ul>
        </li>

        <!-- Research -->
        <li class="sb-item">
            <a href="{{ route('admin.research.create') }}" class="sb-link">Research</a>
        </li>

        <!-- Medicine -->
        <li class="sb-item">
            <a href="{{ route('admin.medicine.create') }}" class="sb-link">Medicine</a>
        </li>

        <!-- About -->
        <li class="sb-item" id="items">
            <a href="{{ route('admin.about') }}" class="sb-link">About Page</a>
        </li>

        <!-- Text -->
        <li class="sb-item" id="items">
            <a href="{{ route('admin.text.create') }}" class="sb-link">Text Data</a>
        </li>

        <!-- Site Informations -->
        <li class="sb-item" id="items">
            <a href="{{ route('admin.site-info') }}" class="sb-link">Site Informations</a>
        </li>
    </ul>
</nav>  