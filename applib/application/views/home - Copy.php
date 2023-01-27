<?php $this->load->view('categories')?>
         
                                    <div data-id="97ca8cb" class="elementor-element elementor-element-97ca8cb elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="447055f" class="elementor-element elementor-element-447055f elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                   <div class="elementor-text-editor elementor-clearfix">
                                                      <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
                                                         <div id="rev_slider_3_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.2">
                                                            <ul>
                                                                <?php $i=1; foreach($slides as $slide): ?>
                                                               <li data-index="rs-<?=$i?>" data-transition="notransition" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="http://bikeway.themes.zone/wp-content/"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                  <img src="wp-content/plugins/revslider/admin/assets/images/transparent.png" data-bgcolor='#ffffff' style='background:#ffffff' alt="" title="Front Page"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                  <div class="tp-caption   tp-resizeme" 
                                                                     id="slide-<?=$i?>-layer-1" 
                                                                     data-x="right" data-hoffset="0" 
                                                                     data-y="bottom" data-voffset="0" 
                                                                     data-width="['none','none','none','none']"
                                                                     data-height="['none','none','none','none']" 
                                                                     data-type="image" 
                                                                     data-responsive_offset="on"  data-frames='[{"delay":750,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                                                                     data-textAlign="['left','left','left','left']"
                                                                     data-paddingtop="[0,0,0,0]"
                                                                     data-paddingright="[0,0,0,0]"
                                                                     data-paddingbottom="[0,0,0,0]"
                                                                     data-paddingleft="[0,0,0,0]"  style="z-index: 5;"><img src="<?=site_url("assets/slides_thumbs/$slide->slide")?>" alt=""  data-no-retina></div>
<!--                                                                 <div class="tp-caption   tp-resizeme" 
                                                                     id="slide-<?=$i?>-layer-3" 
                                                                     data-x="48" 
                                                                     data-y="229" 
                                                                     data-width="['auto']"
                                                                     data-height="['auto']" 
                                                                     data-type="text" 
                                                                     data-responsive_offset="on"  data-frames='[{"delay":1500,"speed":850,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"easeOutBack"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"nothing"}]'
                                                                     data-textAlign="['left','left','left','left']"
                                                                     data-paddingtop="[0,0,0,0]"
                                                                     data-paddingright="[0,0,0,0]"
                                                                     data-paddingbottom="[0,0,0,0]"
                                                                     data-paddingleft="[0,0,0,0]"  style="z-index: 8; white-space: nowrap; font-size: 50px; line-height: 22px; font-weight: 500; color: #3f3f3f; letter-spacing: px;font-family:Rubik;text-transform:uppercase;">bundle</div>
                                                                  <div class="tp-caption   tp-resizeme" 
                                                                     id="slide-<?=$i++?>-layer-4" 
                                                                     data-x="48" 
                                                                     data-y="299" 
                                                                     data-width="['auto']"
                                                                     data-height="['auto']" 
                                                                     data-type="text" 
                                                                     data-responsive_offset="on"  data-frames='[{"delay":1750,"split":"lines","splitdelay":0.1,"speed":700,"split_direction":"forward","frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"easeInOutBack"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                                                                     data-textAlign="['left','left','left','left']"
                                                                     data-paddingtop="[0,0,0,0]"
                                                                     data-paddingright="[0,0,0,0]"
                                                                     data-paddingbottom="[0,0,0,0]"
                                                                     data-paddingleft="[0,0,0,0]"  style="z-index: 9; white-space: nowrap; font-size: 16px; line-height: 24px; font-weight: 400; color: #343434; letter-spacing: px;font-family:Rubik;">This is our most comprehensive vehicle<br> treatment.</div>-->
                                                                  
                                                                    </li>
                                                               <?php endforeach;?> 
                                                               
                                                            </ul>
                                                            <script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
                                                               if(htmlDiv) {
                                                               	htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                               }else{
                                                               	var htmlDiv = document.createElement("div");
                                                               	htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                                                               	document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                                                               }
                                                            </script> 
                                                            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                                                         </div>
                                                         <script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
                                                            if(htmlDiv) {
                                                            	htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                            }else{
                                                            	var htmlDiv = document.createElement("div");
                                                            	htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                                                            	document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                                                            }
                                                         </script> <script type="text/javascript">setREVStartSize({c: jQuery('#rev_slider_3_1'), gridwidth: [878], gridheight: [562], sliderLayout: 'auto'});
                                                            var revapi3,
                                                            	tpj=jQuery;
                                                            tpj.noConflict();			
                                                            tpj(document).ready(function() {
                                                            	if(tpj("#rev_slider_3_1").revolution == undefined){
                                                            		revslider_showDoubleJqueryError("#rev_slider_3_1");
                                                            	}else{
                                                            		revapi3 = tpj("#rev_slider_3_1").show().revolution({
                                                            			sliderType:"standard",
                                                            			jsFileLocation:"<?=site_url('assets/js')?>/",
                                                            			sliderLayout:"auto",
                                                            			dottedOverlay:"none",
                                                            			delay:9000,
                                                            			navigation: {
                                                            				keyboardNavigation:"off",
                                                            				keyboard_direction: "horizontal",
                                                            				mouseScrollNavigation:"off",
                                                             							mouseScrollReverse:"default",
                                                            				onHoverStop:"on",
                                                            				touch:{
                                                            					touchenabled:"on",
                                                            					touchOnDesktop:"off",
                                                            					swipe_threshold: 75,
                                                            					swipe_min_touches: 1,
                                                            					swipe_direction: "horizontal",
                                                            					drag_block_vertical: false
                                                            				}
                                                            				,
                                                            				bullets: {
                                                            					enable:true,
                                                            					hide_onmobile:false,
                                                            					style:"hermes",
                                                            					hide_onleave:false,
                                                            					direction:"horizontal",
                                                            					h_align:"center",
                                                            					v_align:"bottom",
                                                            					h_offset:0,
                                                            					v_offset:20,
                                                            					space:5,
                                                            					tmp:''
                                                            				}
                                                            			},
                                                            			visibilityLevels:[1240,1024,778,480],
                                                            			gridwidth:878,
                                                            			gridheight:562,
                                                            			lazyType:"none",
                                                            			shadow:0,
                                                            			spinner:"spinner2",
                                                            			stopLoop:"off",
                                                            			stopAfterLoops:-1,
                                                            			stopAtSlide:-1,
                                                            			shuffle:"off",
                                                            			autoHeight:"off",
                                                            			disableProgressBar:"on",
                                                            			hideThumbsOnMobile:"off",
                                                            			hideSliderAtLimit:761,
                                                            			hideCaptionAtLimit:761,
                                                            			hideAllCaptionAtLilmit:761,
                                                            			debugMode:false,
                                                            			fallbacks: {
                                                            				simplifyAll:"off",
                                                            				nextSlideOnWindowFocus:"off",
                                                            				disableFocusListener:false,
                                                            			}
                                                            		});
                                                            	}
                                                            	
                                                            });	/*ready*/
                                                         </script> 
                                                         <script>var htmlDivCss = ' #rev_slider_3_1_wrapper .tp-loader.spinner2{ background-color: #fdb819 !important; } ';
                                                            var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
                                                            if(htmlDiv) {
                                                            	htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                            }
                                                            else{
                                                            	var htmlDiv = document.createElement('div');
                                                            	htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                                                            	document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
                                                            }
                                                         </script> 
                                                         <script>var htmlDivCss = unescape(".slider-price%20.currency%20%7B%0A%20%20%20%20font-size%3A%2035%25%20%21important%3B%0A%20%20%20%20vertical-align%3A%20super%3B%0A%20%20%20%20margin%3A%200%203px%200%200%20%21important%3B%0A%20%20%20%20font-weight%3A%20300%20%21important%3B%0A%7D%0A.slider-price%20.cent%20%7B%0A%09font-size%3A%2040%25%20%21important%3B%0A%20%20%20%20vertical-align%3A%20super%3B%0A%20%20%20%20margin%3A%200px%200%200%202px%20%21important%3B%0A%20%20%20%20font-weight%3A%20400%20%21important%3B%0A%20%20%20%20border-bottom%3A%201px%20solid%20%23fff%3B%0A%7D");
                                                            var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
                                                            if(htmlDiv) {
                                                            	htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                            }
                                                            else{
                                                            	var htmlDiv = document.createElement('div');
                                                            	htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                                                            	document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
                                                            }
                                                         </script><script>var htmlDivCss = unescape(".hermes.tp-bullets%20%7B%0A%7D%0A%0A.hermes%20.tp-bullet%20%7B%0A%20%20%20%20overflow%3Ahidden%3B%0A%20%20%20%20border-radius%3A50%25%3B%0A%20%20%20%20width%3A16px%3B%0A%20%20%20%20height%3A16px%3B%0A%20%20%20%20background-color%3A%20rgba%280%2C%200%2C%200%2C%200%29%3B%0A%20%20%20%20box-shadow%3A%20inset%200%200%200%202px%20rgb%28182%2C%20182%2C%20182%29%3B%0A%20%20%20%20-webkit-transition%3A%20background%200.3s%20ease%3B%0A%20%20%20%20transition%3A%20background%200.3s%20ease%3B%0A%20%20%20%20position%3Aabsolute%3B%0A%7D%0A%0A.hermes%20.tp-bullet%3Ahover%20%7B%0A%09%20%20background-color%3A%20rgba%28253%2C%20184%2C%2025%2C%200.8%29%3B%0A%7D%0A.hermes%20.tp-bullet%3Aafter%20%7B%0A%20%20content%3A%20%27%20%27%3B%0A%20%20position%3A%20absolute%3B%0A%20%20bottom%3A%200%3B%0A%20%20height%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20background-color%3A%20rgb%28182%2C%20182%2C%20182%29%3B%0A%20%20box-shadow%3A%200%200%201px%20rgb%28182%2C%20182%2C%20182%29%3B%0A%20%20-webkit-transition%3A%20height%200.3s%20ease%3B%0A%20%20transition%3A%20height%200.3s%20ease%3B%0A%7D%0A.hermes%20.tp-bullet.selected%3Aafter%20%7B%0A%20%20height%3A100%25%3B%0A%7D%0A%0A");
                                                            var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
                                                            if(htmlDiv) {
                                                            	htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                            }
                                                            else{
                                                            	var htmlDiv = document.createElement('div');
                                                            	htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                                                            	document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
                                                            }
                                                         </script> 
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>
                           <section data-id="49c8fab8" class="elementor-element elementor-element-49c8fab8 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="elementor-row">
                                    <div data-id="3bf53b77" class="elementor-element elementor-element-3bf53b77 elementor-column elementor-col-25 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="621bdf2" class="elementor-element elementor-element-621bdf2 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-element_type="image-box.default">
                                                <div class="elementor-widget-container">
                                                   <div class="elementor-image-box-wrapper">
                                                      <figure class="elementor-image-box-img"><img width="512" height="512" src="wp-content/uploads/sites/2/2018/05/delivery-truck-1.png" class="elementor-animation-grow attachment-full size-full" alt="" srcset="wp-content/uploads/sites/2/2018/05/delivery-truck-1.png 512w, wp-content/uploads/sites/2/2018/05/delivery-truck-1-150x150.png 150w, wp-content/uploads/sites/2/2018/05/delivery-truck-1-300x300.png 300w, wp-content/uploads/sites/2/2018/05/delivery-truck-1-290x290.png 290w, wp-content/uploads/sites/2/2018/05/delivery-truck-1-100x100.png 100w" sizes="(max-width: 512px) 100vw, 512px" /></figure>
                                                      <div class="elementor-image-box-content">
                                                         <h3 class="elementor-image-box-title">Free Delivery</h3>
                                                         <p class="elementor-image-box-description">Worldwide from $75</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div data-id="5ac2cf8e" class="elementor-element elementor-element-5ac2cf8e elementor-column elementor-col-25 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="3647a672" class="elementor-element elementor-element-3647a672 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-element_type="image-box.default">
                                                <div class="elementor-widget-container">
                                                   <div class="elementor-image-box-wrapper">
                                                      <figure class="elementor-image-box-img"><img width="512" height="512" src="wp-content/uploads/sites/2/2018/05/reload-1.png" class="elementor-animation-grow attachment-full size-full" alt="" srcset="wp-content/uploads/sites/2/2018/05/reload-1.png 512w, wp-content/uploads/sites/2/2018/05/reload-1-150x150.png 150w, wp-content/uploads/sites/2/2018/05/reload-1-300x300.png 300w, wp-content/uploads/sites/2/2018/05/reload-1-290x290.png 290w, wp-content/uploads/sites/2/2018/05/reload-1-100x100.png 100w" sizes="(max-width: 512px) 100vw, 512px" /></figure>
                                                      <div class="elementor-image-box-content">
                                                         <h3 class="elementor-image-box-title">Easy returns</h3>
                                                         <p class="elementor-image-box-description">365 days for free returns</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div data-id="14568ed4" class="elementor-element elementor-element-14568ed4 elementor-column elementor-col-25 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="6a256922" class="elementor-element elementor-element-6a256922 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-element_type="image-box.default">
                                                <div class="elementor-widget-container">
                                                   <div class="elementor-image-box-wrapper">
                                                      <figure class="elementor-image-box-img"><img width="512" height="512" src="wp-content/uploads/sites/2/2018/05/wallet-1.png" class="elementor-animation-grow attachment-full size-full" alt="" srcset="wp-content/uploads/sites/2/2018/05/wallet-1.png 512w, wp-content/uploads/sites/2/2018/05/wallet-1-150x150.png 150w, wp-content/uploads/sites/2/2018/05/wallet-1-300x300.png 300w, wp-content/uploads/sites/2/2018/05/wallet-1-290x290.png 290w, wp-content/uploads/sites/2/2018/05/wallet-1-100x100.png 100w" sizes="(max-width: 512px) 100vw, 512px" /></figure>
                                                      <div class="elementor-image-box-content">
                                                         <h3 class="elementor-image-box-title">Comfort Payments</h3>
                                                         <p class="elementor-image-box-description">Credit Cards Available</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div data-id="62e41cbb" class="elementor-element elementor-element-62e41cbb elementor-column elementor-col-25 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="2356244c" class="elementor-element elementor-element-2356244c elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-element_type="image-box.default">
                                                <div class="elementor-widget-container">
                                                   <div class="elementor-image-box-wrapper">
                                                      <figure class="elementor-image-box-img"><img width="512" height="512" src="wp-content/uploads/sites/2/2018/05/gift-1.png" class="elementor-animation-grow attachment-full size-full" alt="" srcset="wp-content/uploads/sites/2/2018/05/gift-1.png 512w, wp-content/uploads/sites/2/2018/05/gift-1-150x150.png 150w, wp-content/uploads/sites/2/2018/05/gift-1-300x300.png 300w, wp-content/uploads/sites/2/2018/05/gift-1-290x290.png 290w, wp-content/uploads/sites/2/2018/05/gift-1-100x100.png 100w" sizes="(max-width: 512px) 100vw, 512px" /></figure>
                                                      <div class="elementor-image-box-content">
                                                         <h3 class="elementor-image-box-title">Free Gifts</h3>
                                                         <p class="elementor-image-box-description">Get gifts and discounts</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>
                           <section data-id="ecd6eea" class="elementor-element elementor-element-ecd6eea elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="elementor-row">
                                    <div data-id="341ff35" class="elementor-element elementor-element-341ff35 primary-alt-btn elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="ec0ac52" class="elementor-element elementor-element-ec0ac52 elementor-widget elementor-widget-tz-banner" data-element_type="tz-banner.default">
                                                <div class="elementor-widget-container">
                                                   <figure class="tz-banner effect-milo">
                                                       <img width="542" height="1110" src="<?=  site_url('assets/cats_thumbs/veg.jpg')?>" class="attachment-full size-full" alt="" />
                                                      <figcaption>
                                                         <div class="main-caption">
                                                            <div style="color: #fff; text-align: left; height: 560px; max-height: 100%;">
                                                               <h3 style="font-size: 2.267em; color: #fff; font-weight: 300; margin-bottom: 15px;"><span style="font-weight: 500; display: block;">Vegetable</span></h3>
                                                               <p style="font-size: 14px;"><span style="display: block;">Low Prices. Price match</span>guarantee</p>
                                                               <!--<p style="position: absolute; bottom: 0; display: inline-block;"><span class="button large">Shop Now</span></p>-->
                                                            </div>
                                                         </div>
                                                      </figcaption>
                                                   </figure>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div data-id="468e7ac" class="elementor-element elementor-element-468e7ac elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="28b9ac2" class="elementor-element elementor-element-28b9ac2 elementor-widget elementor-widget-tz-product-tabs" data-element_type="tz-product-tabs.default">
                                                <div class="elementor-widget-container">
                                                   <div class="tz-product-tabs style-2">
                                                      <div class="tab-nav-wrapper">
                                                         <ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active">&nbsp;</li>
<!--                                                            <li role="presentation"><a href="#section-featured" data-toggle="tab" rel="tab" title="Featured">Featured</a></li>
                                                            <li role="presentation"><a href="#section-popular" data-toggle="tab" rel="tab" title="Popular">Popular</a></li>-->
                                                         </ul>
                                                      </div>
                                                      <div class="tab-content">
                                                         <div role="tabpanel" class="tab-pane fade in active row" id="section-new-arrivals-" data-owl="container" data-owl-margin="0" data-owl-slides="3">
                                                            <span class="carousel-loader"></span>
                                                            <div class="slider-navi"><span class="prev"></span><span class="next"></span></div>
                                                            <div class="woocommerce columns-3 ">
                                                               <ul class="products columns-3">
                                                                   <?php  $products=$this->admin_model->get_products_by_cat(1);
                                                                                        foreach($products as $product):
                                                                               ?>
                                                                  <li class="post-99 product type-product status-publish has-post-thumbnail product_cat-brake-parts product_cat-performance-chips product_cat-performance-parts product_cat-suspension-systems product_tag-all-season product_tag-wheels badges-style-3 first instock shipping-taxable purchasable product-type-simple">
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=  site_url("assets/products_thumbs/$product->thumb")?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                              <h2 class="woocommerce-loop-product__title"><?=$product->productTitle?></h2>
                                                                           </a>
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div class="price-wrapper"> <span class="price"><span class="woocs_price_code" data-product-id="99"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;<b><?=$product->price?></b> x </span></span>  </span> <input type="number" value="1" name="quantity" id="<?=$product->productId?>" class="quantity" style="width:50px;padding: 5px;"><span style="font-size:15px"><?=$product->unit?></span> <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>">Add to cart</a></div>
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php endforeach; ?>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                        
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>
                           
                           <section data-id="ecd6eea" class="elementor-element elementor-element-ecd6eea elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="elementor-row">
                                    <div data-id="341ff35" class="elementor-element elementor-element-341ff35 primary-alt-btn elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="ec0ac52" class="elementor-element elementor-element-ec0ac52 elementor-widget elementor-widget-tz-banner" data-element_type="tz-banner.default">
                                                <div class="elementor-widget-container">
                                                   <figure class="tz-banner effect-milo">
                                                       <img width="542" height="1110" src="<?=  site_url('assets/cats_thumbs/fruite.jpg')?>" class="attachment-full size-full" alt="" />
                                                      
                                                   </figure>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div data-id="468e7ac" class="elementor-element elementor-element-468e7ac elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="28b9ac2" class="elementor-element elementor-element-28b9ac2 elementor-widget elementor-widget-tz-product-tabs" data-element_type="tz-product-tabs.default">
                                                <div class="elementor-widget-container">
                                                   <div class="tz-product-tabs style-2">
                                                      <div class="tab-nav-wrapper">
                                                         <ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active">&nbsp;</li>
<!--                                                            <li role="presentation"><a href="#section-featured" data-toggle="tab" rel="tab" title="Featured">Featured</a></li>
                                                            <li role="presentation"><a href="#section-popular" data-toggle="tab" rel="tab" title="Popular">Popular</a></li>-->
                                                         </ul>
                                                      </div>
                                                      <div class="tab-content">
                                                         <div role="tabpanel" class="tab-pane fade in active row" id="section-new-arrivals-" data-owl="container" data-owl-margin="0" data-owl-slides="3">
                                                            <span class="carousel-loader"></span>
                                                            <div class="slider-navi"><span class="prev"></span><span class="next"></span></div>
                                                            <div class="woocommerce columns-3 ">
                                                               <ul class="products columns-3">
                                                                   <?php  $products=$this->admin_model->get_products_by_cat(2);
                                                                                        foreach($products as $product):
                                                                               ?>
                                                                  <li class="post-99 product type-product status-publish has-post-thumbnail product_cat-brake-parts product_cat-performance-chips product_cat-performance-parts product_cat-suspension-systems product_tag-all-season product_tag-wheels badges-style-3 first instock shipping-taxable purchasable product-type-simple">
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=  site_url("assets/products_thumbs/$product->thumb")?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                              <h2 class="woocommerce-loop-product__title"><?=$product->productTitle?></h2>
                                                                           </a>
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div class="price-wrapper"> <span class="price"><span class="woocs_price_code" data-product-id="99"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;<b><?=$product->price?></b> x </span></span>  </span> <input type="number" value="1" name="quantity" id="<?=$product->productId?>" class="quantity" style="width:50px;padding: 5px;"><span style="font-size:15px"><?=$product->unit?></span> <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>">Add to cart</a></div>
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php endforeach; ?>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                        
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>
                           
                           <section data-id="ecd6eea" class="elementor-element elementor-element-ecd6eea elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="elementor-row">
                                    <div data-id="341ff35" class="elementor-element elementor-element-341ff35 primary-alt-btn elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="ec0ac52" class="elementor-element elementor-element-ec0ac52 elementor-widget elementor-widget-tz-banner" data-element_type="tz-banner.default">
                                                <div class="elementor-widget-container">
                                                   <figure class="tz-banner effect-milo">
                                                       <img width="542" height="1110" src="<?=  site_url('assets/cats_thumbs/beverages.jpg')?>" class="attachment-full size-full" alt="" />
                                                      
                                                   </figure>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div data-id="468e7ac" class="elementor-element elementor-element-468e7ac elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                       <div class="elementor-column-wrap elementor-element-populated">
                                          <div class="elementor-widget-wrap">
                                             <div data-id="28b9ac2" class="elementor-element elementor-element-28b9ac2 elementor-widget elementor-widget-tz-product-tabs" data-element_type="tz-product-tabs.default">
                                                <div class="elementor-widget-container">
                                                   <div class="tz-product-tabs style-2">
                                                      <div class="tab-nav-wrapper">
                                                         <ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active">&nbsp;</li>
<!--                                                            <li role="presentation"><a href="#section-featured" data-toggle="tab" rel="tab" title="Featured">Featured</a></li>
                                                            <li role="presentation"><a href="#section-popular" data-toggle="tab" rel="tab" title="Popular">Popular</a></li>-->
                                                         </ul>
                                                      </div>
                                                      <div class="tab-content">
                                                         <div role="tabpanel" class="tab-pane fade in active row" id="section-new-arrivals-" data-owl="container" data-owl-margin="0" data-owl-slides="3">
                                                            <span class="carousel-loader"></span>
                                                            <div class="slider-navi"><span class="prev"></span><span class="next"></span></div>
                                                            <div class="woocommerce columns-3 ">
                                                               <ul class="products columns-3">
                                                                   <?php  $products=$this->admin_model->get_products_by_cat(3);
                                                                                        foreach($products as $product):
                                                                               ?>
                                                                  <li class="post-99 product type-product status-publish has-post-thumbnail product_cat-brake-parts product_cat-performance-chips product_cat-performance-parts product_cat-suspension-systems product_tag-all-season product_tag-wheels badges-style-3 first instock shipping-taxable purchasable product-type-simple">
                                                                     <div class="inner-wrapper with-extra-gallery">
                                                                        <div class="img-wrapper">
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?=  site_url("assets/products_thumbs/$product->thumb")?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""/></a>
                                                                        </div>
                                                                        <div class="excerpt-wrapper">
                                                                           <!--<a class="primary-cat" href="#">cat Name</a>-->
                                                                           <a href="#" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                              <h2 class="woocommerce-loop-product__title"><?=$product->productTitle?></h2>
                                                                           </a>
<!--                                                                           <div class="short-description">
                                                                              <p>Description</p>
                                                                           </div>-->
                                                                            <div class="price-wrapper"> <span class="price"><span class="woocs_price_code" data-product-id="99"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span>&nbsp;<b><?=$product->price?></b> x </span></span>  </span> <input type="number" value="1" name="quantity" id="<?=$product->productId?>" class="quantity" style="width:50px;padding: 5px;"><span style="font-size:15px"><?=$product->unit?></span> <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-productid="<?=$product->productId?>"  data-productname="<?=$product->productTitle?>"  data-image="<?=$product->thumb?>" data-price="<?=$product->price?>">Add to cart</a></div>
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  <?php endforeach; ?>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                        
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </article>
         </main> 