<?php

namespace Nitsan\NsSnow\Controller;

use TYPO3\CMS\Core\Http\Response;
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
     * @return Response
     */
    public function listAction(): Response
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

        if (!$disablesnow) {
            $GLOBALS['TSFE']->additionalFooterData['ns_snow'] = $GLOBALS['TSFE']->additionalFooterData['ns_snow'] ?? '';
            $snowfallScript = "
                <script>
                    $(document).ready(function() {";
            if ($desktoponly) {
                $snowfallScript .= "
                        if ($(window).width() > 768) {";
            }
            $snowfallScript .= "
                            $(document).snowfall();
                            $('.collectonme').hide();
                            $(document).snowfall('clear');
                            $(document).snowfall({";
            if ($activeflackimg) {
                $snowfallScript .= "image: '" . $flackimg . "',";
            } else {
                $snowfallScript .= "shadow: " . $shadowflack . ", round: " . $roundflack . ", flakeColor: '" . $flackcolor . "',";
            }
            $snowfallScript .= "
                                minSize: " . $minflacksize . ",
                                maxSize: " . $maxflacksize . ",
                                minSpeed: " . $minflackspeed . ",
                                maxSpeed: " . $maxflackspeed . ",
                                flakeCount: " . $flackcount . "
                            });";
            if ($desktoponly) {
                $snowfallScript .= "
                        }";
            }
            $snowfallScript .= "
                    });
                </script>";
        
            $GLOBALS['TSFE']->additionalFooterData['ns_snow'] .= $snowfallScript;
        }
        $response = new Response();
        return $response;
    }
}
