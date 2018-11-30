
//
//      Known Theme main Styles
//

//
//      Media Query Sises (based on boothstrap)
$xs: 320px; $sm: 576px; $md: 768px; $lg: 992px; $xl: 1200px;

//
//      colors
$black: #000000; 
$white: #ffffff;
$red: #ff0000;
$grey: #b0b0b0;
$grey_light: #efefef;
$grey_dark: #333333;
$red_dark: #be272d;
$green: #26B40A;

//
//      Mixins
@import 'mixins';

//
//      Reset styles
@import 'reset';

//
//      WordPress Core
@import 'wp_core';

//
//      Helper Classes
@import 'helpers';

//
//      Headings

@import 'headings';

//
//      Known Custom
body {
    font-family: 'Ubuntu', sans-serif;
    font-size: 1rem;
    font-weight: 400;
    color: $black;
    // letter-spacing: 0.0625rem;
}

//
//      Header
.mstr-hdr{
    @include vertical_padding(15px);
    background-color: $grey_dark;
    color: $white;
    &.hro-hdr{
        > img{
            width: 100%;
        }
    }

    .hdr-lgo{
        padding-right: 0
    }

    .custom-logo-link{
        display: block;
        max-width: 90px;
        margin-bottom: 0.5rem;
        @media (min-width: $sm){
            margin-left: 0;
            // max-width: 195px;
        }
        @media (min-width: $md){
            max-width: 195px;
        }
    }
    &.scrlld{
        background-color: transparentize($black, 0.6);
        transition: 0.3s;
        -webkit-transition: 0.3s;
        -moz-transition: 0.3s;
        -ms-transition: 0.3s;
        @media (min-width: $lg){
            padding-bottom: 5px;
        }
        .custom-logo-link{
            @media (min-width: $md){
                max-width: 120px;
            }
        }
    } 
}

.hdr-cntcts{
    text-align: right;
    font-size: 0.875rem;
        @media (min-width: $sm){
            text-align: right;
        } 
        @media (min-width: $md){
            font-size: 1rem;
        } 
    a{
        color: $white;
        margin: 0 0 8px auto;
        display: table;
        @media (min-width: $md){
            display: inline;
            margin-left: 10px;
        } 
        &:hover{
            color: $red;
            .fa{
                color: $red;
            }
        }
        &:first-child{
            @media (min-width: $sm){
                // margin-left: 0;
            } 
        }
        &:last-child{
        }
        .fa{
            margin-right: 3px;
            font-size: 1.25rem;
            font-size: 0.75rem;            
            @media (min-width: $md){
                font-size: 1rem;
            } 
            &:not(.scl-lnk){
                transition: 0s;
                -ms-transition: 0s;
                -moz-transition: 0s;
                -webkit-transition: 0s;
                :hover{
                    color: $red;
                }
            }
            &.scl-lnk{
                margin-left: 3px;
                font-size: 1.25rem;
                @media (min-width: $sm){
                    margin-left: 0;
                } 
                &.fa-facebook-square{
                    &:hover{
                        color: lighten(#4152b2, 15%) !important;
                    }
                }
            }
        }
    }
}

.main-nav-toggle-wrap{
    @media (min-width: $md){
        margin-top: -35px;
    }
    .main-nav-toggle{
        display: table;
        margin: -10px auto 0;
        @media (min-width: $sm){
            margin-right: 0
        } 
        &.open{
            color: $grey;
            .fa{
                color: $grey;
                &.fa-times-thin{
                    display: inline-block !important;
                }
                &.fa-bars{
                    display: none !important;
                }
            }
        }
        .fa{
            @include transition_all(1s);
            color: $white;
        }
    }
}

.menu-nav-menu{
    &.main-nav-menu{
        display: none;
        list-style: none;
        text-transform: uppercase;
        text-align: center;
        padding: 15px 0 5px;
        @media (min-width: $md){
            text-align: left;
        }
        @media (min-width: $lg){
            font-size: 1rem;
            text-align: center;
            overflow: auto;
            margin-left: auto;
            margin-right: 0;
            margin-top: -57px;
        }
        > li{
            padding: 4px 8px 3px;
            border-top: 1px solid lighten($black, 20%);
            &:last-child{
                border-bottom: 1px solid lighten($black, 20%);
                @media (min-width: $lg){
                    padding-right: 0;
                }
            }
            @media (min-width: $lg){
                float: left;
                background-color: transparent !important;
                border-bottom: none !important;
                border-top: none !important;
                padding: 4px 13px 3px;
            }
            &.current-menu-item{
                background-color: lighten($black, 20%);
                a{
                    font-weight: 700;
                    @media (min-width: $lg){
                        border-bottom: 3px solid $white;
                    }
                    &:hover{
                        font-weight: 700;
                    }
                }
            }
            > a{
                color: $white;
                font-size: 0.9375rem;
                display: block;
                padding: 3px 0;
                @media (min-width: $lg){
                    padding: 0;
                }
                &:hover{
                    border-bottom: 3px solid $white;
                    font-weight: 700;
                    @media (min-width: $lg){
                        font-weight: 400;
                    }
                }
                .scrlld &{
                    @media (min-width: $lg){
                        font-size: 0.875rem;
                    }
                }
            }
        }
    }
}


.mstr-bnnr{
    height: auto;
    background-color: $grey_light;
    overflow: hidden;
    @media screen and (min-width: $xl){
        height: calc(100vh - 140px);        
    }
    &.hro-vh{
        height: calc(100vh - 100vh/2);
        @media screen and (min-width: $md){
            height: auto;
        }
        @media screen and (min-width: $xl){
            height: calc(100vh - 140px);
        }
        .hme-main-sldr{
            font-size:  0.75rem;
            @media screen and (min-width: $lg){
                font-size:  0.875rem;
            }
            @media screen and (min-width: $xl){
                font-size:  1rem;
            }
            &.carousel{
                height: 100%;
                .carousel-inner{
                    height: 100%;
                }
                .carousel-item{
                    height: 100%;
                }
                .img-src {
                    position: absolute;
                    top: 15px;
                    right: 15px;
                    padding: 5px;
                    max-width: 120px;
                    // background-color: transparentize($grey_light, 0.5);
                    @media screen and (min-width: $xl){
                        max-width: 250px;
                    }
                }
                .img-src-innr{
                    position: relative;
                }
                .carousel-caption{
                    left: 0;
                    right: 0;                     
                    bottom: 0;
                    background-color: transparentize($black, 0.5);
                    @media screen and (min-width: $md){
                        top: 50%;
                    }
                    .pge-sctn{
                        height: 100%;
                        > .row{
                            height: 100%;
                        }
                    }
                    h3{                            
                        @media screen and (min-width: $lg){
                            font-size: 1.25rem;
                        }
                    }
                    .bttn{
                        border-color: $white;
                        color: $white;
                        font-size:  0.75rem;
                        font-weight: 400;
                        &:hover{
                            color: $red_dark;
                            border-color: $grey_dark;
                        }
                    }
                }
                .crsl-cntrl{
                    opacity: 1;
                    z-index: 5;
                    top: 200px;
                    bottom: 200px;
                    .fa{
                        color: $white;
                        font-size: 1.875rem;
                    }
                }
            }
        }


    }
    &:not(.hro-vh){
        position: relative;
        @media screen and (min-width: $lg){
            max-height: 30rem;
            overflow: hidden;
        }

        .img-src {
            position: absolute;
            top: 15px;
            padding: 5px;
            bottom: auto;
            right: 15px;
            max-width: 80px;
            // background-color: transparentize($grey_light, 0.5);
            @media screen and (min-width: $xl){
                max-width: 115px;
            }
        }
        .img-src-innr{
            position: relative;
        }
    }
    img{
        width: 100%;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }
}

//
//      Full width content
.hro{
    &.ltst-blg{
        h2{
            // color: $white;
        }
        .pst-ttl{
            text-transform: uppercase;
            a{
                color: $white;
                &:hover{
                    color: $red_dark;
                }
            }
        }
        .blck-img{
            max-width: 100%;
        }
    }
}


//
//      Page width sections
.pge-sctn{
    &.contct-sctn{
        .cntct-dtls{
            h3{
                font-weight: 700;
            }
            a{
                color: $grey_dark;
                &:hover{
                    color: $red;
                }
                .fa{
                    color: $red;
                }
            }
        }
    }
    
    &.ftrd-prdcts{
        h3{
            text-transform: uppercase;
            font-weight: 700;
            a{
                color: $black;
                &:hover{
                    color: $red_dark;
                }
            }
        }
    }

    &.ftrd-clnts{
        .carousel-indicators{
            .sldr-itm-nav{
                @include shape_block(8px, 8px);
                border-radius: 50%;
                cursor: pointer;
            }
        }
    }
    .tm-mmbr{
        .blck-img{
            @include horizontal_center;
            max-width: 220px;
        }
    }
}
.pge-cntnt-wdth{

    &.ftrd-clnts{
        .blck{
            padding-bottom: 30px;
        }
        .blck-img{
            margin-bottom: 0;
        }
    }
}

//
//  Template specific
.home{
}


.blg-ovrvw{
    .blog:not(.paged) & .blck{
        &.blg-pst{
            &:first-child{
                -webkit-box-flex: 0;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
                .sharing{
                    margin-top: 0.625rem;
                    margin-bottom: -27px;
                }
            }
        }
    }
    .blck-img{
        max-width: 100%;
    }
    .pst-ttl{
        text-transform: uppercase;
        a{
            color: $grey_dark;
            &:hover{
                color: $red;
            }
        }
    }
    .sharing{
        margin-bottom: -27px;
    }
}
.single{
}


//
//      Sidbar
.pge-sdbr{
    .wdgt{
        &.widget_categories{
            > ul{
                padding-bottom: 0;
            }
        }
        &.widget_recent_entries{
            > ul{
                padding-bottom: 0;
            }
        }
    }
    a{
        color: $grey_dark;
        &:hover{
            color: $red;
        }
    }
}


//
//      Footer
.mstr-ftr{
    font-size: 0.875rem;
    a{
        color: $black;
        &:hover{
            color: $green;
        }
    }
}

.menu-nav-menu{
    &.footer-nav-menu{
        @media (min-width: $xs){
            @include horizontal_center;
            display: table;
            overflow: auto;
        } 
        > li{
            list-style: none;
            @media (min-width: $xs){
                float: left;
                padding: 0 5px 0 4px;
                border-right: 0.09375rem solid $black;
            } 
            &:first-child{
                padding-left: 0;
            }
            &:last-child{
                border-right: none;
                padding-right: 0;
            }
        }
    }
}

.ftr-cntcts{
    a{
        margin: 0 8px;
        @media (min-width: $lg){
            margin-left: 0;
            margin-right: 16px;
        } 
        &:hover{
            & > .fa{
                color: $green;
            }
        }
    }
    .fa{
        margin-right: 3px;
        transition: 0s;
        -webkit-transition: 0s;
        -moz-transition: 0s;
        -ms-transition: 0s;
        margin-right: 3px;
        &:hover{
            color: $green;
        }
    }
}

.ftr-rght{
    .bcktotop-bttn-wrp{
        .bcktotop-bttn{
            display: none;
            position: fixed;
            transition: 0.8s;
            -webkit-transition: 0.8s;
            -moz-transition: 0.8s;
            -ms-transition: 0.8s;
            bottom: 54px;
            right: 15px;
            font-size: 1.125rem;
            padding: 2px 4px 0;
            border-radius: 3px;
            &.show{
                display: inline;
                background-color: $red;
                .fa{
                    color: $white;
                    border-top-color: $white;
                }
            }
            @media (min-width: $lg){
                bottom: 135px;
                right: auto;
            }
            .fa{
                border-radius: 2px;
                font-size: 1rem;
                color: transparent;
                border-top: 3px solid transparent;
            }
        }
    }
    .ftr-scl-mda{
        
    }
    .fa{
        font-size: 1.25rem;
    }
}

//
//      Plugins Override
@import 'plugins_override';
