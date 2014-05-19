<body>
    <!-- Menu -->
    <div id= "page-container" class="container"> <!--This container end in footer.php-->
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <img class="header-image" src="<?php echo URL; ?>public/img/header.jpg" alt="Sharing is caring">
            </div>
        </div>
        <div class="row">   
            <div class="col-sm-10 col-sm-offset-1">
                <nav role="navigation" class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1 class="navbar-brand">Sharing is Caring</h1>
                    </div>
                    <!-- Collection of nav links, forms, and other content for toggling -->
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo URL; ?>">Home</a></li>
                            <li><a href="<?php echo URL; ?>videos">Videos</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">My Profile <b class="caret"></b></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?php echo URL; ?>profile/myvideos">My videos</a></li>
                                    <li><a href="<?php echo URL; ?>profile/myprofile">Profile</a></li>
                                    <li><a href="<?php echo URL; ?>profile/messages">Messages</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo URL; ?>profile/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form role="search" class="navbar-form navbar-right">
                            <div class="form-group">
                                <input type="text" placeholder="Search for videos..." class="form-control">
                            </div>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo URL; ?>profile/login">Login</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

