<body>
    <!-- Menu -->
    <div id= "page-container" class="container"> <!--This container end in footer.php-->
            <div class="row">
                <div class="col-sm-12">
                    <a href="<?php echo URL; ?>" alt="Sharing is Caring">
                        <img class="header-image" title ="Sharing is caring" src="<?php echo URL; ?>public/img/header.jpg" alt="Sharing is caring">
                    </a>
                </div>
            </div>
            <div class="row">   
                <div class="col-sm-12">
                    <nav role="navigation" class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="<?php echo URL; ?>"><h1 class="navbar-brand">Sharing is Caring</h1></a>
                        </div>
                        <!-- Collection of nav links, forms, and other content for toggling -->
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="<?php if(strtolower($title)=='home') echo 'active'?>"><a href="<?php echo URL; ?>">Home</a></li>
                                <li class="<?php if(strtolower($title)=='movies') echo 'active'?>"><a href="<?php echo URL; ?>movies">Movies</a></li>
                                <?php if($isUserLoggedIn):?>
                                    <li class="dropdown <?php if(strtolower($title)=='profile') echo 'active'?>">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><img class="menu-thumbnail" src="<?php echo $_SESSION['user_profile_thumb']?>" alt="YOU" title="YOU"><?php if($isUserLoggedIn) echo ucfirst($_SESSION['user_name']) . '\'s Profile'; else echo 'My Profile'?><b class="caret"></b></a>
                                        <ul role="menu" class="dropdown-menu">
                                            <li><a href="<?php echo URL; ?>profile/mymovies">My Movies</a></li>
                                            <li><a href="<?php echo URL; ?>profile/myprofile">Profile</a></li>
                                            <li><a href="<?php echo URL; ?>profile/messages">Messages</a></li>
                                            <li class="divider"></li>
                                            <li><a href="<?php echo URL; ?>profile/logout">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php endif;?>
                            </ul>
                           
                            <form role="search" class="navbar-form navbar-right" method="post" action="<?php echo URL; ?>movies/search">
                                <div class="form-group">
                                    <input type="text" name="searchfield" placeholder="Search for movies..." class="form-control">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </form>
                            <?php if(!$isUserLoggedIn):?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="<?php echo URL; ?>profile/login">Login</a></li>
                                </ul>
                            <?php endif;?>
                        </div>
                    </nav>
                </div>
            </div>
        <div class="row">
