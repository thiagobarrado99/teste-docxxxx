<?php 
    $item_counts = item_counts();
?>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Menu Principal -->
    <h6 class="category-title">Menu Principal</h6>
    <ul class="nav flex-column">
        @include('sidebarItem', [
            'item_title' => 'Dashboard',
            'item_url' => '/dashboard',
            'item_icon' => 'fa-tachometer-alt',
        ])

        @include('sidebarItem', [
            'item_title' => 'CEPs',
            'item_url' => '/dashboard/zips',
            'item_icon' => 'fa-tag',
            'item_create_url' => '/dashboard/zips/create',
            'item_total_count' => $item_counts["zips"]
        ])
    </ul>
</div>