
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Buy Hold Projection</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <link rel='stylesheet' href="{{ url('home/css/style.css')}}">
</head>



<body>
<section class="shadow">
    <div class="top_menuues">
        <div class="container">
            <div class="top_sec_menu align-to-right">
                <ul>
                    <li><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li>
                    <li><a href="{{ url('about-us') }}"><i class="fa fa-user"></i> <span>About Us</span></a></li>
                    <li><a href="{{ url('help') }}"><i class="fa fa-phone"></i> <span>Help ?</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main_header_area animated">
            <nav id="navigation1" class="navigation">
                <!-- Logo Area Start -->
                <div class="nav-header">
                    <a class="nav-brand" href="{{ url('') }}"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
                    <div class="nav-toggle"></div>
                </div>
                <!-- Main Menus Wrapper -->
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu align-to-right">
                        <li>
                            <a href="{{ url('features') }}">Features</a>
                            <ul class="nav-dropdown">
                                <li><a href="javascript:void(0);">Features</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('market-place-list') }}">Market Place</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Market Place Clone</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('resources-tools') }}">Resourses & Tools</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Resourses & Tools Clone</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Company</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Kowledgebase</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('faq') }}">FAQ's</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">FAQ's Clone</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Price</a>
                        </li>
                        <li class="lgo_space"><a href="{{ url('login') }}" id="activess">Login</a></li>
                        <li class="clr_cngs"><a href="{{ url('registration') }}" id="activess">Register Free</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
    

<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="propty_item_liststs">
                <div class="are_bxxx">
                    <div class="croosss" id="language-wrapper">
                        <i class="fa fa-times language-title"></i>

                        <div class="language-text" style="display: none;">
                            <div id="und_lists_areaaa">
                                <h4>Property Doesn't Meet Criteria</h4>

                                <ul>
                                    <li><i class="fa fa-times rd_tik"></i> <span class="tx_blk">Price greater</span> that 250.000</li>

                                    <li><i class="fa fa-times rd_tik"></i> <span class="tx_blk">Cash Needed</span> preater than 50.000</li>

                                    <li><i class="fa fa-times rd_tik"></i> <span class="tx_red">Fails 50% Rule</span></li>

                                    <li><i class="fa fa-times rd_tik"></i> <span class="tx_blk">Price/Sq.Ft.</span> greater than 100</li>

                                    <li><i class="fa fa-times rd_tik"></i> <span class="tx_blk">ARV/Sq.Ft.</span> greater than 100</li>

                                    <li><i class="fa fa-check gr_tik"></i> <span class="tx_grns">Passes 1% Rule</span></li>

                                    <li><i class="fa fa-check gr_tik"></i> <span class="tx_grns">Passes 2% Rule</span></li>

                                    <li><i class="fa fa-times rd_tik"></i> <span class="tx_red">Fails 50% Rule</span></li>

                                    <li><i class="fa fa-times rd_tik"></i> <span class="tx_blk">Cash Flow</span> less than 200</li>
                                </ul>

                                <div class="edttsss">
                                    <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a> Click icon to edit criteria
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mgs_areaa">
                    <img src="{{ url('home/img/propertys.jpg')}}" alt="" />

                    <span class="reltalls">RENTAL</span>
                </div>

                <div class="contensss_list">
                    <div class="copyyy_txt">
                        <h5 class="onclicks">
                            Copy Test <span class="dots_clicks"><i class="fa fa-caret-down"></i></span>
                        </h5>

                        <div class="clicckshowd">
                            <h5><a href="javascript:void(0);">Share Report</a></h5>

                            <ul>
                                <li><a href="javascript:void(0);">Compare</a></li>

                                <li><a href="javascript:void(0);">Copy</a></li>

                                <li><a href="javascript:void(0);">Copy Address</a></li>

                                <li><a href="javascript:void(0);">Move to BRRRRs</a></li>

                                <li><a href="javascript:void(0);">Move to Flips</a></li>

                                <li><a href="javascript:void(0);">Move to Wholesale</a></li>

                                <li><a href="javascript:void(0);">Archive</a></li>

                                <li><a href="javascript:void(0);">Save as Template</a></li>
                            </ul>

                            <p class="dltts"><a href="javascript:void(0);">Delete</a></p>
                        </div>
                    </div>

                    <div class="und_cntss_listst">
                        <p>GGN</p>

                        <p>Gurgoun, Haryana 303313</p>

                        <p>
                            <span class="area_contss">4 <span class="brss">BR</span> <span class="slesss">/</span> 4 BA <span class="slesss">/</span> </span>
                        </p>

                        <p class="pricss_lstts">
                            <span class="blue bold">₹6,000,000 </span> <span class="red"><span class="bold">-233.5%</span> Cap Rate </span>
                        </p>
                    </div>

                    <div class="propety_lststs">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-home"></i></span> Property Description
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-pencil"></i></span> Purchase Worksheet
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-picture-o"></i></span> Photos
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-map-marker"></i></span> Map
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="propety_lststs">
                        <p>ANALYSIS</p>

                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-pie-chart"></i></span> Property Analysis
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-bar-chart"></i></span> Buy & Hold Projections
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="propety_lststs">
                        <p>RESEARCH</p>

                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-usd"></i></span> Sales Comps & ARV
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-key"></i></span> Rental Comps & Rent
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-files-o"></i></span> Records & Listings
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-user"></i></span> Owner Lookup
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="propety_lststs">
                        <p>TOOLS</p>

                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-calendar"></i></span> Offer Calculator
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-file-text"></i></span> Reports & Sharing
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-exchange"></i></span> Compare Properties
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);">
                                    <span class="i_conss"><i class="fa fa-university"></i></span> Find Local Lenders
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--start full details -->

        <div class="col-12 col-sm-9">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="lsting_proprty purch_list_conts" id="alss_pgesss">
                        <h3>Buy Hold Projection</h3>

                        <p class="brdsss"><a href="javascript:void(0);">Rentals</a> <span>/</span> Buy Hold Projection</p>
                    </div>

                    <div class="propfixsd new_propertyy hollss mt-4">
                        <div class="table-responsive table-fixed-labels properties-comparison-table">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed als_show_ar">
                                <tbody>
                                    <tr>
                                        <td class="text-left">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">&nbsp;</td>
                                    </tr>

                                    <tr class="ta_heightts">
                                        <td class="text-left">Years (Starting From the Year of Rent Out)</td>
                                    </tr>
                                </tbody>

                                <!---- 1 SNAPSHOT OF PROPERTY PERFORMANCE ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">1 SNAPSHOT OF PROPERTY PERFORMANCE</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Cash Flow (Annual)</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Year End Accumulated Equity</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Return on investment</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Return On Equity</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Rate Of Gross Return</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Total Profit </span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!---- End 1 SNAPSHOT OF PROPERTY PERFORMANCE ----->

                                <!---- 2 INCOME ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">2 INCOME</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees"> Gross Rent (Yearly )</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Vacancy</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Vacancy Rate ? <span class="us_pl_area">-</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Other income <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Operating Income ( Yearly ) <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Income Increase ( Annual )?</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!---- End 2 INCOME ----->

                                <!---- 3 EXPENSES ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">3 EXPENSES</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Maintenance Charges</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Property Management <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Property Taxes <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Misclanious Charges <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Other Charges <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Operating Cost ( Yearly ) <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Operating Cost Increase ( Annual )?</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!---- End 3 EXPENSES ----->

                                <!---- 4 CASH FLOW  ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">4 CASH FLOW</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Operating Income</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Operating Income</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Operating Cost</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Operating Cost <span class="us_pl_area">-</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Net Operating Income</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Net Operating Income <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Loan EMI</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Loan EMI <span class="us_pl_area">-</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Cash Flow ( Annual ) <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Post Tax Cash Flow</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!---- End 4 CASH FLOW  ----->

                                <!---- 5 CUMMULATIVE DEBT PAYDOWN  ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">5 CUMMULATIVE DEBT PAYDOWN</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>EMI</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">EMI</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Principle Part - Debt Paywown</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Principle Part - Debt Paywown <span class="us_pl_area">-</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Cummulative Debt Paydown</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Cummulative Debt Paydown <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!---- End CUMMULATIVE DEBT PAYDOWN  ----->

                                <!----  6 EQUITY ACCUMULATIONS  ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">6 EQUITY ACCUMULATIONS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Market Value of Property</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Market Value of Property</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Principle Part - Debt Paywown</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Propery appreciation ( Annual )?</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Loan Balance</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Loan Balance</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>LTV Ratio:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">LTV Ratio:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Year End Accumulated Equity</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Year End Accumulated Equity <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 6 EQUITY ACCUMULATIONS  ----->

                                <!----  7 NNUAL RETURN ANALYSIS  ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">7 NNUAL RETURN ANALYSIS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Annual Price Appreciations</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Annual Price Appreciations</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Annual Cash Flow</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Annual Cash Flow <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Annual Principel Paydown</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Annual Principel Paydown <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Annual Return</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Total Annual Return <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 7 NNUAL RETURN ANALYSIS  ----->

                                <!---- 8 ROI ANALYSIS  ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">8 ROI ANALYSIS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Annual Return</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Total Annual Return</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Cash Invested</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Total Cash Invested</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Cummulative Debt Paydown</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Return On Investment</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!---- End 8 ROI ANALYSIS  ----->

                                <!----  9 ROE ANALYSIS ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">9 ROE ANALYSIS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Annual Return</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Total Annual Return</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Year End Accumulated Equity</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Year End Accumulated Equity</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Return On Equity</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Return On Equity</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 9 ROE ANALYSIS ----->

                                <!----  10 GROSS RETURNS ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">10 GROSS RETURNS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Cummulative Cash Flow</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Cummulative Cash Flow</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Year End Accumulated Equity</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Year End Accumulated Equity <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Return ( Equity+Cash Flow )</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Total Return ( Equity+Cash Flow ) <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Cash Invested</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Total Cash Invested <span class="us_pl_area">-</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Rate Of Gross Return</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Rate Of Gross Return</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 10 GROSS RETURNS ----->

                                <!----  11 SALES & RETURN ANALYSIS ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">11 SALES & RETURN ANALYSIS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Equity</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Equity</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Selling Cost ( 3% ) - L2</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Selling Cost ( 3% ) - L2 <span class="us_pl_area">-</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Net Sales Price</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Net Sales Price <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Cummulative Cash Flow</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Cummulative Cash Flow <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Amount Received on Sale</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Total Amount Received on Sale</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Cash Invested</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Total Cash Invested <span class="us_pl_area">-</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Profit</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Total Profit</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Profit ( in % of Investment )</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Total Profit ( in % of Investment )</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Compound Annual Growth Rate ( CAGR )</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees blue">Compound Annual Growth Rate ( CAGR )</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 11 SALES & RETURN ANALYSIS ----->

                                <!----  12 TAX BENEFITS & DEDUCTIONS ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">12 TAX BENEFITS & DEDUCTIONS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Operating Cost</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Operating Cost</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Loan Interest Part</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Loan Interest Part <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Depreciation</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Depreciation <span class="us_pl_area">+</span></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Total Deductions</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees redss">Total Deductions <span class="us_pl_area">=</span></span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 12 TAX BENEFITS & DEDUCTIONS ----->

                                <!----  13 INVESTMENT RETURNS ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">13 INVESTMENT RETURNS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Cap Rate (Purchase Price):</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Cap Rate (Purchase Price):</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Cap Rate (Market Value):</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Cap Rate (Market Value):</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Cash on Cash Return:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Cash on Cash Return:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Return on Equity:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Return on Equity:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Return on Investment:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Return on Investment:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Internal Rate of Return</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Internal Rate of Return</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 13 INVESTMENT RETURNS ----->

                                <!----  14 FINANCIAL RATIOS ----->

                                <tbody>
                                    <tr>
                                        <td class="text-left bg_bluess">14 FINANCIAL RATIOS</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Rent to Value:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Rent to Value:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Gross Rent Multiplier:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Gross Rent Multiplier:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Equity Multiple:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Equity Multiple:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Break Even Ratio:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Break Even Ratio:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Debt Coverage Ratio:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Debt Coverage Ratio:</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left qr_tp_areaaa">
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>

                                                <div class="tooltip">
                                                    <h5>Debt Yield:</h5>

                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>

                                            <span class="hd_vluees">Debt Yield:</span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!----  End 14 FINANCIAL RATIOS ----->
                            </table>
                        </div>

                        <div class="table-responsive table-fixed-labels properties-comparison-table secendss">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed">
                                <tbody>
                                    <tr>
                                        <td>MV</td>

                                        <td>Discount</td>

                                        <td>SELF FUNDING</td>

                                        <td>BANK ROI</td>

                                        <td>GROSS RENT (Monthly)</td>

                                        <td>VACANCY</td>

                                        <td>APPRECIATION</td>

                                        <td>INCOME INCREASE</td>

                                        <td>EXP. INCREASE</td>

                                        <td>SELLING COST</td>

                                        <td>LOAN AMOUNT</td>

                                        <td>TENURE</td>

                                        <td>BANK EMI</td>

                                        <td>PRINCIPLE PART</td>

                                        <td>INTEREST PART</td>

                                        <td>TOTAL SELF INVESTMENT</td>

                                        <td>Land Cost</td>

                                        <td>Taxes</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>70300</td>

                                        <td>10%</td>

                                        <td>20%</td>

                                        <td>7.43%</td>

                                        <td>10.9%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>2.0%</td>

                                        <td>3.0%</td>

                                        <td>50616</td>

                                        <td>20</td>

                                        <td>₹ 4,867</td>

                                        <td>₹ 1,167</td>

                                        <td>₹ 2,167</td>

                                        <td>12654</td>

                                        <td>30%</td>

                                        <td>20%</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>Year 2025 <span class="ful_lanthss">1</span></td>

                                        <td>Year 2026 <span class="ful_lanthss">2</span></td>

                                        <td>Year 2027 <span class="ful_lanthss">3</span></td>

                                        <td>Year 2028 <span class="ful_lanthss">4</span></td>

                                        <td>Year 2029 <span class="ful_lanthss">5</span></td>

                                        <td>Year 2030 <span class="ful_lanthss">6</span></td>

                                        <td>Year 2031 <span class="ful_lanthss">7</span></td>

                                        <td>Year 2032 <span class="ful_lanthss">8</span></td>

                                        <td>Year 2033 <span class="ful_lanthss">9</span></td>

                                        <td>Year 2034 <span class="ful_lanthss">10</span></td>

                                        <td>Year 2035 <span class="ful_lanthss">11</span></td>

                                        <td>Year 2036 <span class="ful_lanthss">12</span></td>

                                        <td>Year 2037 <span class="ful_lanthss">13</span></td>

                                        <td>Year 2038 <span class="ful_lanthss">14</span></td>

                                        <td>Year 2039 <span class="ful_lanthss">15</span></td>

                                        <td>Year 2040 <span class="ful_lanthss">16</span></td>

                                        <td>Year 2041 <span class="ful_lanthss">17</span></td>

                                        <td>Year 2042 <span class="ful_lanthss">18</span></td>

                                        <td>Year 2043 <span class="ful_lanthss">19</span></td>

                                        <td>Year 2044 <span class="ful_lanthss">20</span></td>
                                    </tr>
                                </tbody>

                                <!---- 1 SNAPSHOT OF PROPERTY PERFORMANCE ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>
                                    </tr>

                                    <tr>
                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>
                                    </tr>

                                    <tr>
                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>
                                    </tr>

                                    <tr>
                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>
                                    </tr>

                                    <tr>
                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>
                                    </tr>

                                    <tr>
                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>
                                    </tr>
                                </tbody>

                                <!---- End 1 SNAPSHOT OF PROPERTY PERFORMANCE ----->

                                <!---- 2 INCOME ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>
                                    </tr>

                                    <tr>
                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>
                                    </tr>

                                    <tr>
                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>

                                        <td>₹0</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>
                                    </tr>
                                </tbody>

                                <!---- End 2 INCOME ----->

                                <!---- 3 EXPENSES ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>1,000</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>
                                    </tr>

                                    <tr>
                                        <td>600</td>

                                        <td>₹612</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>
                                    </tr>

                                    <tr>
                                        <td>250</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>
                                    </tr>

                                    <tr>
                                        <td>160</td>

                                        <td>₹163</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>
                                    </tr>

                                    <tr>
                                        <td>1200</td>

                                        <td>₹1,230</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>

                                        <td>2.0%</td>
                                    </tr>
                                </tbody>

                                <!---- End 3 EXPENSES ----->

                                <!---- 4 CASH FLOW ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹7,280</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>
                                    </tr>

                                    <tr>
                                        <td>₹3,210</td>

                                        <td>₹612</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>₹4,070</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>
                                    </tr>

                                    <tr>
                                        <td>₹4,939</td>

                                        <td>₹163</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>

                                        <td>₹383</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>

                                        <td>-₹695</td>
                                    </tr>
                                </tbody>

                                <!---- End 4 CASH FLOW ----->

                                <!---- 5 CUMMULATIVE DEBT PAYDOWN ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹4,939</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>
                                    </tr>

                                    <tr>
                                        <td>₹1,178</td>

                                        <td>₹612</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>

                                        <td>₹869</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>₹1,178</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>

                                        <td>₹7,280</td>
                                    </tr>
                                </tbody>

                                <!---- End 5 CUMMULATIVE DEBT PAYDOWN ----->

                                <!---- 6 EQUITY ACCUMULATIONS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹73,815</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>

                                        <td>5.0%</td>
                                    </tr>

                                    <tr>
                                        <td>₹49438</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>

                                        <td>67%</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>
                                    </tr>
                                </tbody>

                                <!---- End 6 EQUITY ACCUMULATIONS ----->

                                <!---- 7 NNUAL RETURN ANALYSIS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹3,515</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>

                                        <td>₹1,020</td>
                                    </tr>

                                    <tr>
                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>
                                    </tr>

                                    <tr>
                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>

                                        <td>₹1,178</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>
                                    </tr>
                                </tbody>

                                <!---- End 7 NNUAL RETURN ANALYSIS ----->

                                <!---- 8 ROI ANALYSIS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>
                                    </tr>

                                    <tr>
                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>

                                        <td>30.2%</td>
                                    </tr>
                                </tbody>

                                <!---- End 8 ROI ANALYSIS ----->

                                <!----  9 ROE ANALYSIS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>

                                        <td>₹3,824</td>
                                    </tr>

                                    <tr>
                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>

                                        <td>15.7%</td>
                                    </tr>
                                </tbody>

                                <!---- End 9 ROE ANALYSIS ----->

                                <!----  10 GROSS RETURNS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>
                                    </tr>

                                    <tr>
                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>

                                        <td>₹23,508</td>
                                    </tr>

                                    <tr>
                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>

                                        <td>₹12,654</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>

                                        <td>86%</td>
                                    </tr>
                                </tbody>

                                <!---- End 10 GROSS RETURNS ----->

                                <!----  11 SALES & RETURN ANALYSIS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>

                                        <td>₹24,377</td>
                                    </tr>

                                    <tr>
                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>

                                        <td>₹2,214</td>
                                    </tr>

                                    <tr>
                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>

                                        <td>₹22,162</td>
                                    </tr>

                                    <tr>
                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>

                                        <td>-₹869</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>

                                        <td>₹21,293</td>
                                    </tr>

                                    <tr>
                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>

                                        <td>12654</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>

                                        <td>₹8,639</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>
                                    </tr>

                                    <tr class="blue">
                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>
                                    </tr>
                                </tbody>

                                <!----  End 11 SALES & RETURN ANALYSIS ----->

                                <!----  12 TAX BENEFITS & DEDUCTIONS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>

                                        <td>₹3,210</td>
                                    </tr>

                                    <tr>
                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>

                                        <td>₹3,761</td>
                                    </tr>

                                    <tr>
                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>

                                        <td>₹1,055</td>
                                    </tr>

                                    <tr class="redss">
                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>

                                        <td>₹8,025</td>
                                    </tr>
                                </tbody>

                                <!---- End  12 TAX BENEFITS & DEDUCTIONS ----->

                                <!----  13 INVESTMENT RETURNS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>
                                    </tr>

                                    <tr>
                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>
                                    </tr>

                                    <tr>
                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>
                                    </tr>

                                    <tr>
                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>
                                    </tr>

                                    <tr>
                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>
                                    </tr>

                                    <tr>
                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>
                                    </tr>
                                </tbody>

                                <!----  End 13 INVESTMENT RETURNS ----->

                                <!----  14 FINANCIAL RATIOS ----->

                                <tbody>
                                    <tr class="bg_bluess">
                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>

                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>

                                        <td>5.8%</td>
                                    </tr>

                                    <tr>
                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>
                                    </tr>

                                    <tr>
                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>

                                        <td>-6.9%</td>
                                    </tr>

                                    <tr>
                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>

                                        <td>-3.6%</td>
                                    </tr>

                                    <tr>
                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>

                                        <td>68.3%</td>
                                    </tr>

                                    <tr>
                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>

                                        <td>5.5%</td>
                                    </tr>
                                </tbody>

                                <!----  End 14 FINANCIAL RATIOS ----->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div>gghghg</div>


<!-- Footer -->
<footer id="ftr_alsss">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="lgo_areaa">
                    <div class="lgo">
                        <a href="javascript:void(0);"><img src="{{ url('home/img/lgo_botms.png')}}" alt="" /></a>
                    </div>
                    <div class="lg_ply">
                        <a href="javascript:void(0);"><img src="{{ url('home/img/gl_play.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Platform</h2>
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> How it works</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Features</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Plans & pricing</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Product pudates</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Career</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Lets Talk</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Our Team</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Clients</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Testimonials</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Use Cases</h2>
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Buy & Hold Analysis</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Buy & sell Analysis</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> BFRR Analysis (LAPA)</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Commercial Analysis</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Resources</h2>
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Help Center</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Mobile App</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Free Resources</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Affiliate Program</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Company</h2>
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> About us</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Our Blog</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Contact Us</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Press Kit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copy_btm">Copyright 2023 <a href="javascript:void(0);">1CRwebsite.com</a> all rights reserved</div>
    </div>
</footer>
<!-- End Footer -->


  		<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
        <!--  -->
		  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script> 
        <script src="{{ url('home/js/menu_js.js')}}"></script>
	    <script src="{{ url('home/js/responsive.js')}}"></script>
	
<script src='https://cdnjs.cloudflare.com/ajax/libs/echarts/5.2.2/echarts.min.js'></script>	
<script>
 const chart1 = echarts.init(document.getElementById('chart1'));
const option1 = {
  title: {
    text: '',
    left: 'left' },

  grid: {
    show: true,
    top: 30,
    backgroundColor: '#fff' },

  tooltip: {
    trigger: 'axis' },


  xAxis: {
    data: ['1997', '1998', '1999', '2000', '2001', '2002'] },

  yAxis: {},
  series: [
  {
    name: 'Y',
    type: 'line',
    data: [10, 35, 20, 13, 12, 18] },

  {
    name: 'X',
    type: 'line',
    data: [20, 11, 10, 9, 8, 8] }] };
	
	
	
	
chart1.setOption(option1);
chart1.group = 'group1';
echarts.connect('group1');	
</script>	
	
<script>

var owl = $('#slidersss');

              owl.owlCarousel({
                margin: 0,
				loop: true,
                dots:false,
                nav:true,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],

                autoplay: false,
                responsive: {
                  0: {
                    items: 1
                  },

                  600: {
                    items: 1
                  },

                  1000: {
                    items:1
                  },

                  1200: {
                    items:1
                  }
                }

  });

</script>	
	
<script>
var owl = $('#banner');
              owl.owlCarousel({
                margin: 0,
                dots:true,
                nav:false,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items:1
                  },
                  1200: {
                    items:1
                  }
                }
  });
</script>

	
<script>
var owl = $('#testimonials');
              owl.owlCarousel({
                margin: 30,
				loop: true,
                dots:true,
                nav:false,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 2
                  },
                  1000: {
                    items:3
                  },
                  1200: {
                    items:3
                  }
                }
  });
</script>	
	
<script>
 $("document").ready(function(){
  $(".tab-slider--body").hide();
  $(".tab-slider--body:first").show();
});

$(".tab-slider--nav li").click(function() {
  $(".tab-slider--body").hide();
  var activeTab = $(this).attr("rel");
  $("#"+activeTab).fadeIn();
	if($(this).attr("rel") == "tab2"){
		$('.tab-slider--tabs').addClass('slide');
	}else{
		$('.tab-slider--tabs').removeClass('slide');
	}
  $(".tab-slider--nav li").removeClass("active");
  $(this).addClass("active");
});
</script>
	
	<script>
	 $(function() {
	  $('.hidden_ck').hide();
	  $('.trigger').change(function() {  
		var hiddenId = $(this).attr("data-trigger");
		if ($(this).is(':checked')) {
		  $("#" + hiddenId).show();
		} else {
		  $("#" + hiddenId).hide();
		}
	  });
	});
	</script>
	
	
	<script>
	 $('.tab-link').click( function() {	
	  var tabID = $(this).attr('data-tab');	
	  $(this).addClass('active').siblings().removeClass('active');	
	  $('#tab-'+tabID).addClass('active').siblings().removeClass('active');
     });
	</script>
	
	<script>
	   var $el = $(".onclicks");
		var $ee = $(".clicckshowd");
		$el.click(function(e){
		  e.stopPropagation();
		  $(".clicckshowd").toggleClass('active');
		});
		$(document).on('click',function(e){
		  if(($(e.target) != $el) && ($ee.hasClass('active'))){
		  $ee.removeClass('active');
		  // console.log("yes");
		}
		});
	</script>
	
	
	<script>
	 function funcToggle() {
	  $(".cont").toggleClass('hidden');
	 };
	</script>
	
	<script>
	 $(function() {
	  $('#language-wrapper').hover(
		function() {
		  $('.language-text').fadeIn();
		},
		function() {
		  $('.language-text').fadeOut();
		}
	  );
	 });
	</script>
	
<!-- start new add -->
<script>
 $(document).ready(function(){
	
	$("#extend").click(function(e){
		e.preventDefault();
		$("#extend-field").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
// 1
$(document).ready(function(){
	
	$("#extend1").click(function(e){
		e.preventDefault();
		$("#extend-field1").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field1").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
// 2
$(document).ready(function(){
	
	$("#extend2").click(function(e){
		e.preventDefault();
		$("#extend-field2").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field2").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
// 3
$(document).ready(function(){
	
	$("#extend3").click(function(e){
		e.preventDefault();
		$("#extend-field3").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field3").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
</script>

<script>
  $("#search-icon").click(function() {
  $(".nav").toggleClass("search");
  $(".nav").toggleClass("no-search");
  $(".search-input").toggleClass("search-active");
});

$('.menu-toggle').click(function(){
   $(".nav").toggleClass("mobile-nav");
   $(this).toggleClass("is-active");
});

</script>
</body>
</html>