    <tr>
                                    <th>Product</th>
                                    <td>{{ $billing->product }}</td>                                 
                                </tr>								
							 
								<tr>
                                    <th>Amount</th>
                                    <td>₹. {{ $billing->amount }}</td>                                 
                                </tr>
								<tr>
                                    <th>Date</th>
                                    <td>{{ date('d-m-Y',strtotime($billing->created_at)) }}</td>                                 
                                </tr>
								<tr>
                                    <th>Ref.No</th>
                                    <td>{{ $billing->reference_no }}</td>                                 
                                </tr>
								<tr>
                                    <th>Paid Via</th>
                                    <td>{{ $billing->payment_mode }}</td>                                 
                                </tr>