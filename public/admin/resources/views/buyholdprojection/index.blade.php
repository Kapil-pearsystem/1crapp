@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buy & Hold Projection List </h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('customer.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>
                
            </div>

        </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buy & Hold Projection List </h6>

            </div>
            <div class="card-body proptt_y">
              <div class="propfixsd new_propertyy">
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
				<tr>
                    <td class="text-left bg_bluess">SNAPSHOT OF PROPERTY PERFORMANCE</td>
                </tr>                
            </tbody>

            <tbody>
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
               
            </tbody>



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
            </tbody>
            
	   </table>
    </div>
</div>

			</div>
        </div>

    </div>
 

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
 

new DataTable( '#example-table-theme', {
    paging: true,
    
} );
</script> 
@endsection
