
<div class='absolute top-0 right-0 p-4 flex items-center justify-between w-full'>
    @include('components.users')
    @include('components.home')
    <div class="flex items-center space-x-4">
        @include('components.logout')
        @include('components.theme-toggle') 
    </div>
</div>