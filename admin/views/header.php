    <?
    $admin_avatar = $_SESSION["admin_avatar"];
    $admin_name = $_SESSION["admin_name"];
    $page_url = $_SERVER["PHP_SELF"];
    ?>
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="dashboard">
                        <span class="brand-logo">
                        <img src="app-assets/images/logo/favicon.png">
                        </span>
                        <h2 class="brand-text mb-0"><?=$g_title;?></h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
              
                
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="<?=(settings("admin_theme"))?'sun':'moon';?>"></i></a></li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
               
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder"><?=$admin_name;?></span>
                            <span class="user-status">Администратор</span>
                        </div>
                        <span class="avatar"><img class="round" src="../<?=$admin_avatar;?>" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <!-- <a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox</a>
                        <a class="dropdown-item" href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a>
                        <a class="dropdown-item" href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a>
                        
                        <a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> Settings</a>
                        <a class="dropdown-item" href="page-pricing.html"><i class="mr-50" data-feather="credit-card"></i> Pricing</a>
                        <a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a> -->
                        <a class="dropdown-item" href="settings"><i class="mr-50" data-feather="settings"></i> Тохиргоо</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout"><i class="mr-50" data-feather="power"></i> Гарах</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
  
    <!-- END: Header-->