<?php

namespace Nitsan\NsSnow\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/***
 *
 * This file is part of the "NS Snow" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * NSnowsController
 */
class NSnowsController extends ActionController
{
    /**
     * action list
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $flackcount = $this->settings['flackcount'];
        $activeflackimg = $this->settings['activeflackimg'];
        $flackimg = $this->settings['flackimg'];
        $flackcolor = $this->settings['flackcolor'];
        $minflacksize = $this->settings['minflacksize'];
        $maxflacksize = $this->settings['maxflacksize'];
        $minflackspeed = $this->settings['minflackspeed'];
        $maxflackspeed = $this->settings['maxflackspeed'];
        $roundflack = $this->settings['roundflack'];
        $shadowflack = $this->settings['shadowflack'];
        $disablesnow = $this->settings['disablesnow'];
        $desktoponly = $this->settings['desktoponly'];

        if ($disablesnow) {
            return $this->htmlResponse();
        } else {
            $GLOBALS['TSFE']->additionalFooterData['ns_snow'] = $GLOBALS['TSFE']->additionalFooterData['ns_snow'] ?? '';
            if ($activeflackimg) {
                if ($desktoponly) {
                    $GLOBALS['TSFE']->additionalFooterData['ns_snow'] .= "<script>
                                $(document).ready(function(){
                                    if ($(window).width() > 768) {
                                        $(document).snowfall();
                                        $('.collectonme').hide();
                                        $(document).snowfall('clear');
                                        $(document).snowfall({image :'" . $flackimg . "', minSize: " . $minflacksize . ', maxSize:' . $maxflacksize . ',minSpeed: ' . $minflackspeed . ', maxSpeed: ' . $maxflackspeed . ',flakeCount:' . $flackcount . '});
                                    }
                                });
                        </script>';
                } else {
                    $GLOBALS['TSFE']->additionalFooterData['ns_snow'] .= "<script>
                        $(document).ready(function(){
                            $(document).snowfall();
                            $('.collectonme').hide();
                            $(document).snowfall('clear');
                            $(document).snowfall({image :'" . $flackimg . "', minSize: " . $minflacksize . ', maxSize:' . $maxflacksize . ',minSpeed: ' . $minflackspeed . ', maxSpeed: ' . $maxflackspeed . ',flakeCount:' . $flackcount . '});
                        });
                    </script>';
                }
            } else {
                if ($desktoponly) {
                    $GLOBALS['TSFE']->additionalFooterData['ns_snow'] .= "<script>
                            $(document).ready(function(){
                                if ($(window).width() > 768) {
                                    $(document).snowfall();
                                    $('.collectonme').hide();
                                    $(document).snowfall('clear');
                                    $(document).snowfall({shadow : " . $shadowflack . ', round : ' . $roundflack . ", flakeColor:'" . $flackcolor . "',  minSize: " . $minflacksize . ', maxSize:' . $maxflacksize . ',minSpeed: ' . $minflackspeed . ', maxSpeed: ' . $maxflackspeed . ', flakeCount:' . $flackcount . '});
                                }
                            });
                        </script>';
                } else {
                    $GLOBALS['TSFE']->additionalFooterData['ns_snow'] .= "<script>
                        $(document).ready(function(){
                            $(document).snowfall();
                            $('.collectonme').hide();
                            $(document).snowfall('clear');
                            $(document).snowfall({shadow : " . $shadowflack . ', round : ' . $roundflack . ", flakeColor:'" . $flackcolor . "',  minSize: " . $minflacksize . ', maxSize:' . $maxflacksize . ', minSpeed: ' . $minflackspeed . ', maxSpeed: ' . $maxflackspeed . ', flakeCount:' . $flackcount . '});
                        });
                    </script>';
                }
            }
            return $this->htmlResponse();
        }
    }
}
