<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$site_name;?> &mdash; <?=$tagline;?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
        <link href='<?=current_url()?>' rel='canonical'/>
        <link href='<?=base_url('assets/')?>favicon.ico' rel='image_src'/>
        <link href='<?=base_url('assets/')?>favicon.ico' hreflang='x-default' rel='alternate'/>
        <link href='<?=base_url('assets/')?>favicon.ico' rel='icon' type='image/x-icon'/>
        <link href='//www.sharethis.com' rel='dns-prefetch'/>
        <meta content='index, follow' name='robots'/>
        <meta name="keywords" content="<?=@$keyword ? $keyword : $this->config->item('keyword');?>">
        <meta name="description" content="<?=@$description ? $description : $this->config->item('description');?>">
        <meta content='indonesia' name='geo.placename'/>
        <meta content='LokerHub' name='Author'/>
        <meta content='general' name='rating'/>
        <meta content='id' name='geo.country'/>
        <meta content='<?=$this->config->item('google_site_console');?>' name='google-site-verification'/>
        <meta content='<?=$this->config->item('dmca');?>' name='dmca-site-verification'/>
        <meta content='<?=$this->config->item('yandex');?>' name='yandex-verification'/>
        <!-- [ END Meta Tag SEO Valid HTML5] --> 

        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url('assets/')?>fonts/icomoon/style.css">

        <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/magnific-popup.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/jquery-ui.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/animate.css">
        
        <link rel="stylesheet" href="<?=base_url('assets/')?>fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/aos.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
        <script src="<?=base_url('assets/');?>js/jquery-3.3.1.min.js"></script>
        <script src="<?=base_url('assets/');?>js/jquery-migrate-3.0.1.min.js"></script>
        <script src="<?=base_url('assets/');?>js/jquery-ui.js"></script>
        <script src="<?=base_url('assets/');?>js/popper.min.js"></script>
        <script src="<?=base_url('assets/');?>js/bootstrap.min.js"></script>
        <script src="<?=base_url('assets/');?>js/owl.carousel.min.js"></script>
        <script src="<?=base_url('assets/');?>js/jquery.stellar.min.js"></script>
        <script src="<?=base_url('assets/');?>js/jquery.countdown.min.js"></script>
        <script src="<?=base_url('assets/');?>js/jquery.magnific-popup.min.js"></script>
        <script src="<?=base_url('assets/');?>js/bootstrap-datepicker.min.js"></script>
        <?php if($this->uri->segment(1) == 'lowongan'):?>
        <style type="text/css">
            a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
            a.gflag img {border:0;}
            a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
            #goog-gt-tt {display:none !important;}
            .goog-te-banner-frame {display:none !important;}
            .goog-te-menu-value:hover {text-decoration:none !important;}
            body {top:0 !important;}
            #google_translate_element2 {display:none!important;}
        </style>

        
        <script type="text/javascript">
        function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
        </script>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
        <script type="text/javascript">
        /* <![CDATA[ */
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
        /* ]]> */
        </script>
        <?php endif; ?>
       
    </head>
    <body>
    
    <div class="site-wrap">

        <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->
        
        
        <div class="site-navbar-wrap js-site-navbar bg-white">        
            <div class="container">
                <div class="site-navbar bg-light">
                <div class="py-1">
                    <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="<?=base_url();?>">Loker<strong class="font-weight-bold">Hub</strong> </a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                        <div class="container">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li><a href="<?=base_url();?>">Home</a></li>
                            <li class="has-children">
                                <a href="<?=base_url('job');?>">Lowongan Kerja</a>
                                <ul class="dropdown arrow-top">
                                <li class="has-children">
                                    <a href="#" rel="nofollow">Top Kategori</a>
                                    <ul class="dropdown">
                                    <li><a href="<?=base_url('kategori/it-perangkat-lunak');?>">IT Perangkat Lunak</a></li>
                                    <li><a href="<?=base_url('kategori/manufaktur');?>">Manufaktur</a></li>
                                    <li><a href="<?=base_url('kategori/seni-desain-kreatif');?>">Seni Desain Kreatif</a></li>
                                    <li><a href="<?=base_url('kategori/audit-pajak');?>">Audit Pajak</a></li>
                                    <li><a href="<?=base_url('kategori/penerbangan');?>">Penerbangan</a></li>
                                    <li><a href="<?=base_url('kategori/mekanik-otomotif');?>">Mekanik Otomotif</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="has-children">
                                    <a href="#">Top Perusahaan</a>
                                    <ul class="dropdown">
                                    <li><a href="#">Teknik Informasi</a></li>
                                    <li><a href="#">Sales Marketing</a></li>
                                    </ul>
                                </li> -->
                                <li class="has-children">
                                    <a href="#">Lokasi Terpopuler</a>
                                    <ul class="dropdown">
                                    <li><a href="<?=base_url('lokasi/bandung');?>">Bandung</a></li>
                                    <li><a href="<?=base_url('lokasi/karawang');?>">Karawang</a></li>
                                    <li><a href="<?=base_url('lokasi/palembang');?>">Palembang</a></li>
                                    <li><a href="<?=base_url('lokasi/medan');?>">Medan</a></li>
                                    <li><a href="<?=base_url('lokasi/batam');?>">Batam</a></li>
                                    <li><a href="<?=base_url('lokasi/yogyakarta');?>">Yogya</a></li>
                                    <li><a href="<?=base_url('lokasi/malang');?>">Malang</a></li>
                                    <li><a href="<?=base_url('lokasi/semarang');?>">Semarang</a></li>
                                    <li><a href="<?=base_url('lokasi/pekanbaru');?>">Pekanbaru</a></li>
                                    <li><a href="<?=base_url('lokasi/makassar');?>">Makassar</a></li>
                                    <li><a href="<?=base_url('lokasi/lampung');?>">Lampung</a></li>
                                    <li><a href="<?=base_url('lokasi/sidoarjo');?>">Sidoarjo</a></li>
                                    <li><a href="<?=base_url('lokasi/solo');?>">Solo</a></li>
                                    <li><a href="<?=base_url('lokasi/bali');?>">Bali</a></li>
                                    <li><a href="<?=base_url('lokasi/padang');?>">Padang</a></li>
                                    <li><a href="<?=base_url('lokasi/jambi');?>">Jambi</a></li>
                                    <li><a href="<?=base_url('lokasi/samarinda');?>">Samarinda</a></li>
                                    <li><a href="<?=base_url('lokasi/surabaya');?>">Surabaya</a></li>
                                    </ul>
                                </li>

                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Lokasi Kerja</a>
                                <ul class="dropdown arrow-top">
                                <li class="has-children">
                                    <a href="#">Jabodetabek</a>
                                    <ul class="dropdown">
                                    <li><a href="<?=base_url('lokasi/dki-jakarta');?>">Jakarta</a></li>
                                    <li><a href="<?=base_url('lokasi/bogor');?>">Bogor</a></li>
                                    <li><a href="<?=base_url('lokasi/depok');?>">Depok</a></li>
                                    <li><a href="<?=base_url('lokasi/tanggerang');?>">Tanggerang</a></li>
                                    <li><a href="<?=base_url('lokasi/bekasi');?>">Bekasi</a></li>
                                    </ul>
                                </li>
                                

                                </ul>
                            </li>
                            <li><a href="<?=base_url('job');?>"><span class="bg-primary text-white py-3 px-4 rounded">Cari</a></li>
                            </ul>
                        </div>
                        </nav>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?=@$content;?>
        


        
        <footer class="site-footer">
        <div class="container">        

            <div class="row">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4 text-white">Tentang Kami</h3>
                <p>LokerHub adalah <?=$this->config->item('description');?></p>
                <!-- <p><a href="#" class="btn btn-primary pill text-white px-4">Read More</a></p> -->
            </div>
            <div class="col-md-6">
                <div class="row">
                <div class="col-md-6">
                    <h3 class="footer-heading mb-4 text-white">Halaman</h3>
                    <ul class="list-unstyled">
                        <li><a href="<?=base_url('page/about');?>">About</a></li>
                        <!-- <li><a href="<?=base_url('blog');?>">Blog</a></li> -->
                        <li><a href="<?=base_url('page/disclaimer');?>">Disclaimer</a></li>
                        <li><a href="<?=base_url('page/terms-of-use');?>">Terms of Use</a></li>
                        <li><a href="<?=base_url('page/privacy-policy');?>">Privacy Policy</a></li>
                        <li><a href="<?=base_url('page/sitemap');?>">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="footer-heading mb-4 text-white">Top Kategori</h3>
                    <ul class="list-unstyled">
                        <li><a href="<?=base_url('kategori/it-perangkat-lunak');?>">IT Perangkat Lunak</a></li>
                        <li><a href="<?=base_url('kategori/manufaktur');?>">Manufaktur</a></li>
                        <li><a href="<?=base_url('kategori/seni-desain-kreatif');?>">Seni Desain Kreatif</a></li>
                        <li><a href="<?=base_url('kategori/audit-pajak');?>">Audit Pajak</a></li>
                        <li><a href="<?=base_url('kategori/penerbangan');?>">Penerbangan</a></li>
                        <li><a href="<?=base_url('kategori/mekanik-otomotif');?>">Mekanik Otomotif</a></li>
                    </ul>
                </div>
                </div>
            </div>

            
            <div class="col-md-2">
                <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
                <div class="col-md-12">
                    <p>
                    <a href="https://www.facebook.com/lokerhubcom" rel="nofollow" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                    <a href="https://www.twitter.com/lokerhubcom" rel="nofollow" class="p-2"><span class="icon-twitter"></span></a>
                    <a href="https://www.instagram.com/lokerhubcom" rel="nofollow" class="p-2"><span class="icon-instagram"></span></a>

                    </p>
                </div>
            </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    Copyright &copy; <?=date('Y');?> <a href="<?=base_url()?>">LokerHub</a>  All Right Reserved 
                </p>
            </div>
            
            </div>
        </div>
        </footer>
    </div>

    <script src="<?=base_url('assets/');?>js/aos.js"></script>
    <script src="<?=base_url('assets/');?>js/main.js"></script>
    </body>
</html> 