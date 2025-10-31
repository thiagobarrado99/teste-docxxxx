
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="btn sidebar-toggle" id="mobileToggle">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand desktop-only" href="/dashboard">
            <i class="fas fa-tag"></i> Teste Docteka
        </a>
        
        <div class="d-flex align-items-center">
            <!-- Notification Icon -->
            <div class="dropdown">
                <a href="#" class="notification-icon text-white text-decoration-none" role="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span id="notification_counter" class="notification-badge @if(Auth::user()->notificationUnreadCount() <= 0) d-none @endif">{{ Auth::user()->notificationUnreadCount() }}</span>
                </a>
                
                <ul id="notification_list" class="dropdown-menu dropdown-notifications p-2" style="max-height: 512px; overflow-y: scroll;" aria-labelledby="notificationDropdown">

                    @if (count(Auth::user()->notifications) > 0) 
                        @foreach (Auth::user()->notifications as $notification)
                        <li>
                            @if(empty($notification->url))
                            <div class="dropdown-item">
                                <div class="@if ($notification->viewed) opacity-75 @endif">
                                    <h6 class="mb-0 fw-bold">{!! $notification->title !!}</h6>
                                    <p style="white-space: break-spaces;" class="mb-0 text-muted">{!! $notification->body !!}</p>
                                    <p style="font-size: 70%;" class="mb-0 text-muted text-end"><i class="fas fa-clock"></i>&nbsp;{{ date_create($notification->created_at)->format("d/m/Y H:i:s") }}</small>
                                </div>
                            </div>
                            @else
                            <a class="dropdown-item hover-darken-light" href="{{ $notification->url }}">
                                <div class="@if ($notification->viewed) opacity-75 @endif">
                                    <h6 class="mb-0 fw-bold">{!! $notification->title !!}</h6>
                                    <p style="white-space: break-spaces;" class="mb-0 text-muted">{!! $notification->body !!}</p>
                                    <p style="font-size: 70%;" class="mb-0 text-muted text-end"><i class="fas fa-clock"></i>&nbsp;{{ date_create($notification->created_at)->format("d/m/Y H:i:s") }}</small>
                                </div>
                            </a>
                            @endif
                        </li>
                        @if (!$loop->last)
                        <hr class="my-0">
                        @endif
                        @endforeach
                    @else
                    <li>
                        <div class="dropdown-item d-flex" href="#">
                            Nenhuma notificação.
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
            
            <!-- User Dropdown -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-avatar me-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/dashboard/api-info"><i class="fas fa-key me-2"></i>API REST</a></li>
                    <hr>
                    <li><a class="dropdown-item" id="logout_button" href="#"><i class="fas fa-sign-out-alt me-2"></i>Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>