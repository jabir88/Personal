<?php

namespace OXI_FLIP_BOX_PLUGINS\Public_Render;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Style_1
 * Content of Shortcode Addons Plugins
 *
 * @author $biplob018
 */

/**
 * Description of Create
 *
 * @author biplo
 */
use OXI_FLIP_BOX_PLUGINS\Page\Public_Render;

class Style3 extends Public_Render {

    public function default_render($style, $child, $admin) {
        $styledata = $this->style;
        foreach ($child as $key => $val) {
            $value = json_decode(stripslashes($val['rawdata']), true);

            $icon = $front_hadding = $front_info = $starturl = $backinfo = $endurl = $bt = $bc = '';
            if ($value['sa_flip_boxes_icon'] != '') {
                $icon .= '<div class="oxi-addons-flip-box-front-icon">
                    ' . $this->font_awesome_render($value['sa_flip_boxes_icon']) . '
                    </div>';
            }
            if ($value['sa_flip_boxes_heading'] != '') {
                $front_hadding .= '<div class="oxi-addons-flip-box-front-headding">
                            ' . $this->text_render($value['sa_flip_boxes_heading']) . '
                            </div> ';
            }
            if ($value['sa_flip_boxes_font_description'] != '') {
                $front_info .= '<div class="oxi-addons-flip-box-front-info">
                            ' . $this->text_render($value['sa_flip_boxes_font_description']) . '
                            </div> ';
            }

            if ($value['sa_flip_boxes_back_description'] != '') {
                $backinfo .= '<div class="oxi-addons-flip-box-back-info">
                        ' . $this->text_render($value['sa_flip_boxes_back_description']) . '
                        </div>';
            }
            if ($this->url_render('sa_flip_boxes_button_link', $value) != '') {
                $starturl .= '<a ' . $this->url_render('sa_flip_boxes_button_link', $value) . '>';
                $endurl .= '</a>';
            }
            echo ' <div class="oxi-flip-box-col-style-3 ' . $this->column_render('sa-flip-boxes-col', $style) . ' ' . ($admin == "admin" ? 'oxi-addons-admin-edit-list' : '') . '">
                        <div class="oxi-addons-flip-box-style-3">' . $starturl . '
                            <div class="oxi-addons-flip-boxes-body"  ' . $this->animation_render('sa-flip-boxes-animation', $style) . '>
                                <div class="oxi-addons-flip-boxes-body-data">
                                    <div class="oxi-addons-flip-box-flip ' . $styledata['sa-ac-flip_boxes_flip_direction'] . '">
                                        <div class="oxi-addons-flip-box-flip-data ' . $styledata['sa-ac-flip_boxes_flip_effects'] . '">
                                            <div class="oxi-addons-flip-box-style">
                                                <div class="oxi-addons-flip-box-front">
                                                    <div class="oxi-addons-flip-box-front-section-box">
                                                        <div class="oxi-addons-flip-box-front-section">
                                                            ' . $icon . ' 
                                                            ' . $front_hadding . '
                                                            ' . $front_info . '
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="oxi-addons-flip-box-back">
                                                    <div class="oxi-addons-flip-box-back-section-box">
                                                        <div class="oxi-addons-flip-box-back-section">
                                                            ' . $backinfo . '
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>' . $endurl . '
                        </div>';
            if ($admin == 'admin') :
                echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <button class="btn btn-primary shortcode-addons-template-item-edit" type="button" value="' . $val['id'] . '">Edit</button>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                            <button class="btn btn-danger shortcode-addons-template-item-delete" type="submit" value="' . $val['id'] . '">Delete</button>
                            </div>
                        </div>';
            endif;
            echo ' </div>';
        }
    }

    public function old_render() {
        $styleid = $this->oxiid;
        $styledata = explode('|', $this->dbdata['css']);
        $listdata = $this->child;
        ?>
        <div class="oxilab-flip-box-wrapper">
            <?php
            foreach ($listdata as $value) {
                if (!empty($value['files'])):
                    $filesdata = explode("{#}|{#}", $value['files']);
                    ?>
                    <div class="<?php echo $styledata[43]; ?> oxilab-flip-box-padding-<?php echo $styleid; ?>" 
                         sa-data-animation="<?php echo $styledata[55]; ?>"
                         sa-data-animation-offset="100%"
                         sa-data-animation-delay="0ms"
                         sa-data-animation-duration=" <?php echo ($styledata[57] * 1000); ?>ms"
                         >
                        <div class="oxilab-flip-box-body-<?php echo $styleid; ?> oxilab-flip-box-body-<?php echo $styleid; ?>-<?php echo $value['id']; ?>">
                            <?php
                            if ($filesdata[9] != '') {
                                echo '<a href="' . $filesdata[9] . '" target="' . $styledata[53] . '">';
                                $fileslinkend = '</a>';
                            } else {
                                $fileslinkend = '';
                            }
                            ?>
                            <div class="oxilab-flip-box-body-absulote">
                                <div class="<?php echo $styledata[1]; ?>">
                                    <div class="oxilab-flip-box-style-data <?php echo $styledata[3]; ?>">
                                        <div class="oxilab-flip-box-style">
                                            <div class="oxilab-flip-box-front">
                                                <div class="oxilab-flip-box-<?php echo $styleid; ?>">
                                                    <div class="oxilab-flip-box-<?php echo $styleid; ?>-data">                                            
                                                        <div class="oxilab-icon">
                                                            <div class="oxilab-icon-data">
                                                                <?php echo $this->font_awesome_render($filesdata[3]) ?>
                                                            </div>
                                                        </div>
                                                        <div class="oxilab-heading">
                                                            <?php echo $this->text_render($filesdata[1]); ?>
                                                        </div>
                                                        <div class="oxilab-info">
                                                            <?php echo $this->text_render($filesdata[13]); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="oxilab-flip-box-back">
                                                <div class="oxilab-flip-box-back-<?php echo $styleid; ?>">
                                                    <div class="oxilab-flip-box-back-<?php echo $styleid; ?>-data">                                           
                                                        <div class="oxilab-info">
                                                            <?php echo $this->text_render($filesdata[7]); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $fileslinkend; ?>
                        </div>


                        <style>
                <?php
                if ($filesdata[5] == '') {
                    echo '.oxilab-flip-box-body-' . $styleid . '-' . $value['id'] . ' .oxilab-flip-box-' . $styleid . '{
background-color: ' . $styledata[5] . ';}';
                } else {
                    echo '.oxilab-flip-box-body-' . $styleid . '-' . $value['id'] . ' .oxilab-flip-box-' . $styleid . '{
background: linear-gradient(' . $styledata[5] . ', ' . $styledata[5] . '), url("' . $filesdata[5] . '");
-moz-background-size: 100% 100%;
-o-background-size: 100% 100%;
background-size: 100% 100%;
}';
                }
                ?>
                <?php
                if ($filesdata[11] == '') {
                    echo '.oxilab-flip-box-body-' . $styleid . '-' . $value['id'] . ' .oxilab-flip-box-back-' . $styleid . '{
background-color: ' . $styledata[13] . ';}';
                } else {
                    echo '.oxilab-flip-box-body-' . $styleid . '-' . $value['id'] . ' .oxilab-flip-box-back-' . $styleid . '{
background: linear-gradient(' . $styledata[13] . ', ' . $styledata[13] . '), url("' . $filesdata[11] . '");
-moz-background-size: 100% 100%;
-o-background-size: 100% 100%;
background-size: 100% 100%;
}';
                }
                ?>                                     
                        </style>
                    </div>
                    <?php
                endif;
            }
            ?>
            <style>                    
                .oxilab-flip-box-padding-<?php echo $styleid; ?>{
                    padding: <?php echo $styledata[49]; ?>px <?php echo $styledata[51]; ?>px;
                    transition:  opacity <?php echo $styledata[57]; ?>s linear;
                    -webkit-animation-duration: <?php echo $styledata[57]; ?>s;
                    -moz-animation-duration: <?php echo $styledata[57]; ?>s;
                    -ms-animation-duration: <?php echo $styledata[57]; ?>s;
                    -o-animation-duration: <?php echo $styledata[57]; ?>s;
                    animation-duration: <?php echo $styledata[57]; ?>s;
                }
                .oxilab-flip-box-body-<?php echo $styleid; ?>{
                    max-width: <?php echo $styledata[45]; ?>px;
                    width: 100%;
                    margin: 0 auto;
                    position: relative;   
                }
                .oxilab-flip-box-body-<?php echo $styleid; ?>:after {
                    padding-bottom: <?php echo $styledata[47] / $styledata[45] * 100; ?>%;
                    content: "";
                    display: block;
                }
                .oxilab-flip-box-<?php echo $styleid; ?>{
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    display: block;   
                    background-color: <?php echo $styledata[5]; ?>;
                    -webkit-border-radius: <?php echo $styledata[141]; ?>px;
                    -moz-border-radius: <?php echo $styledata[141]; ?>px;
                    -ms-border-radius: <?php echo $styledata[141]; ?>px;
                    -o-border-radius: <?php echo $styledata[141]; ?>px;
                    border-radius: <?php echo $styledata[141]; ?>px;
                    overflow: hidden;
                    -webkit-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    -moz-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    -ms-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    -o-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                }
                .oxilab-flip-box-<?php echo $styleid; ?>-data{
                    position: absolute;
                    left: 0%;
                    top: 50%;            
                    padding: <?php echo $styledata[69]; ?>px <?php echo $styledata[71]; ?>px;
                    -webkit-transform: translateY(-50%);
                    -ms-transform: translateY(-50%);
                    -moz-transform: translateY(-50%);
                    -o-transform: translateY(-50%);
                    transform: translateY(-50%);
                    right: 0;
                }
                .oxilab-flip-box-<?php echo $styleid; ?>-data .oxilab-icon{
                    display: block;
                    text-align: <?php echo $styledata[81]; ?>; 
                    padding: <?php echo $styledata[77]; ?>px <?php echo $styledata[79]; ?>px;
                }
                .oxilab-flip-box-<?php echo $styleid; ?>-data .oxilab-icon-data{
                    display: inline-block;  
                    width: <?php echo $styledata[75]; ?>px;
                    height: <?php echo $styledata[75]; ?>px;
                }
                .oxilab-flip-box-<?php echo $styleid; ?>-data .oxilab-icon-data .oxi-icons{            
                    line-height: <?php echo $styledata[75]; ?>px;
                    font-size: <?php echo $styledata[73]; ?>px;
                    color: <?php echo $styledata[7]; ?>;
                }
                .oxilab-flip-box-<?php echo $styleid; ?>-data .oxilab-heading{
                    display: block;
                    color: <?php echo $styledata[11]; ?>;
                    text-align: <?php echo $styledata[91]; ?>;            
                    font-size: <?php echo $styledata[83]; ?>px;
                    font-family: <?php echo $this->font_familly($styledata[85]); ?>;
                    font-weight: <?php echo $styledata[89]; ?>;
                    font-style:<?php echo $styledata[87]; ?>;
                    padding: <?php echo $styledata[93]; ?>px <?php echo $styledata[99]; ?>px <?php echo $styledata[95]; ?>px <?php echo $styledata[97]; ?>px;  
                }
                .oxilab-flip-box-<?php echo $styleid; ?>-data .oxilab-info{
                    display: block;
                    color: <?php echo $styledata[17]; ?>;
                    text-align: <?php echo $styledata[109]; ?>;            
                    font-size: <?php echo $styledata[101]; ?>px;
                    font-family: <?php echo $this->font_familly($styledata[103]); ?>;
                    font-weight: <?php echo $styledata[107]; ?>;
                    font-style:<?php echo $styledata[105]; ?>;
                    padding: <?php echo $styledata[111]; ?>px <?php echo $styledata[117]; ?>px <?php echo $styledata[113]; ?>px <?php echo $styledata[115]; ?>px;  
                }
                .oxilab-flip-box-back-<?php echo $styleid; ?>{
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    display: block;
                    background-color: <?php echo $styledata[13]; ?>;
                    -webkit-border-radius: <?php echo $styledata[141]; ?>px;
                    -moz-border-radius: <?php echo $styledata[141]; ?>px;
                    -ms-border-radius: <?php echo $styledata[141]; ?>px;
                    -o-border-radius: <?php echo $styledata[141]; ?>px;
                    border-radius: <?php echo $styledata[141]; ?>px;
                    overflow: hidden;
                    -webkit-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    -moz-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    -ms-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    -o-box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;
                    box-shadow: <?php echo $styledata[61]; ?>px <?php echo $styledata[63]; ?>px <?php echo $styledata[65]; ?>px <?php echo $styledata[67]; ?>px <?php echo $styledata[59]; ?>;

                }
                .oxilab-flip-box-back-<?php echo $styleid; ?>-data{           
                    position: absolute;
                    left: 0%;
                    right: 0;
                    top: 50%;            
                    padding: <?php echo $styledata[119]; ?>px <?php echo $styledata[121]; ?>px;
                    -webkit-transform: translateY(-50%);
                    -ms-transform: translateY(-50%);
                    -moz-transform: translateY(-50%);
                    -o-transform: translateY(-50%);
                    transform: translateY(-50%);           
                }
                .oxilab-flip-box-back-<?php echo $styleid; ?>-data .oxilab-info{
                    display: block;
                    color: <?php echo $styledata[15]; ?>;
                    text-align: <?php echo $styledata[131]; ?>;            
                    font-size: <?php echo $styledata[123]; ?>px;
                    font-family: <?php echo $this->font_familly($styledata[125]); ?>;
                    font-weight: <?php echo $styledata[129]; ?>;
                    font-style:<?php echo $styledata[127]; ?>;
                    padding: <?php echo $styledata[133]; ?>px <?php echo $styledata[139]; ?>px <?php echo $styledata[135]; ?>px <?php echo $styledata[137]; ?>px;  

                }
                <?php echo $styledata[143]; ?>; 
            </style>
        </div>
        <?php
    }

}