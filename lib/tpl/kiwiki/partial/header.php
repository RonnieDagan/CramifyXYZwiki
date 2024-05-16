<header id="dokuwiki__header">
    <?php
    
    /*** disable header on login or denied pages ***/
    if(($ACT!="login") && ($ACT!="denied")){
    ?>
    
    <div class="dokuwiki__header__wrapper">
        <div class="group">

            <a class="wikilogo">
                <?php
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);
                ?>
                <img src=<?php echo $logo; ?> class="media" loading="lazy" alt="" width="80">
                <div>
                    <?php echo $conf['title']; ?>
                    <?php if ($conf['tagline']): ?>
                    <div class="claim"><?php echo $conf['tagline'] ?></div>
                    <?php endif ?>
                    <ul class="navigation">
                        <li>Home</li>
                        <li>AP Study Guide Hub</li>
                        <li>Help</li>
                    </ul>
                    
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var homeItem = document.querySelector(".navigation li:nth-child(1)");
                            var studyGuideItem = document.querySelector(".navigation li:nth-child(2)");
                            var helpItem = document.querySelector(".navigation li:nth-child(3)");

                            homeItem.addEventListener("click", function() {
                            window.location.href = "/";
                            });

                            studyGuideItem.addEventListener("click", function() {
                            window.location.href = "/#studyguides";
                            });

                            helpItem.addEventListener("click", function() {
                            window.location.href = "/wiki/doku.php?id=help";
                            });
                        });
                    </script>

                    <style>
                        .navigation li:first-child {
                            padding-left: 20px; /* Adjust the value as needed */
                        }

                        .navigation {
                            font-weight: 500;
                            list-style-type: none; /* Remove default list styles */
                            padding: 0;
                            font-size: medium;
                            cursor: pointer;
                            letter-spacing: 0px;
                        }
                        
                        .navigation li {
                            display: inline-block; /* Display list items horizontally */
                            margin-right: 10px; /* Add spacing between list items */
                            transition: color 0.3s ease;
                        }
                        
                        .navigation li:hover {
                            color: green; /* Change text color to green on hover */
                        }

                        .navigation li:last-child {
                            margin-right: 0; /* Remove margin from the last list item */
                        }
                        
                        /* Add additional styles as needed */
                    </style>
                </div>
            </a>
        </div>

        <?php
        
        tpl_searchform();

        ?> 
        <nav class="tools" aria-label="<?php echo $lang['tools'] ?>">
            <div id="open-search">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'search.svg') ?></strong>
            </div>
            <?php if (tpl_getConf('FullScreenBtn')){?>
            <div id="full-screen">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'full_screen.svg') ?></strong>
            </div>
            <?php } ?>
            <div id="theme-mode">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'theme_mode.svg') ?></strong>
            </div>
            <div id="dokuwiki__pagetools">
                
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'preferences.svg') ?></strong>
                <ul>
                <!-- SITE TOOLS -->
                <li id="sitemenu">
                <?php
                $items = (new \dokuwiki\Menu\SiteMenu())->getItems();
                foreach($items as $item) {
                    echo '<a href="'.$item->getLink().'" title="'.$item->getTitle().'">'
                .'<span class="icon">'.inlineSVG($item->getSvg()).'</span>'
                . '<span class="a11y">'.$item->getLabel().'</span>'
                . '</a>';
                }
                ?>
                </li>
                <!-- PAGE TOOLS -->
                <?php echo (new \dokuwiki\Menu\KiwikiPageMenu())->getListItems('action ', false); ?>
                </ul>
            </div>
            
            
            <!-- USER TOOLS -->
            <?php if ($conf['useacl']): ?>
            <div id="dokuwiki__usertools">
                <strong><?php echo inlineSVG(KIWIKI_IMAGES_PATH . 'user_icon.svg') ?></strong>
                
                <ul>
                    <?php
                            if (!empty($_SERVER['REMOTE_USER'])) {
                                echo '<li class="user">';
                                tpl_userinfo();
                                echo '</li>';
                            }
                        ?>
                    <?php echo (new \dokuwiki\Menu\UserMenu())->getListItems('action ', false); ?>
                </ul>
            </div>
            <?php endif ?>
        </nav>
    </div>
    <?php 
    html_msgarea();
    
} ?>
</header><!-- /header -->
