<?php
if(isset($setting['loading-page']) and $setting['loading-page'] != '') {

    if(stristr($setting['loading-page'], '|')) {

        $loadingPageStyle = explode('|', $setting['loading-page']);

        if(count($loadingPageStyle) == 6) {

            echo '<div id="loading-page" class="animated" rel="' . $loadingPageStyle[5] . '" dir="' . $loadingPageStyle[4] . '"><div><i class="' . $loadingPageStyle[3] . '"></i></div></div>';

            echo '<style>
                * {
                  box-sizing: border-box;
                }
                html, body {
                  height: 100%;
                }
                #loading-page {
                  z-index: 10000;
                  position:fixed;
                  top:0;
                  left:0;
                  width: 100%;
                  min-height: 100%;
                  background: #fff;
                  ' . $loadingPageStyle[0] . '
                }
                #loading-page div {
                    position: fixed;
                    left: 0;
                    width: 100%;
                    text-align: center;
                    ' . $loadingPageStyle[1] . '
                }
                #loading-page div i {
                  ' . $loadingPageStyle[2] . '
                }
            </style>';

        }

    }

}