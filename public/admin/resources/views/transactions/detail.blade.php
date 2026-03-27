                                <tr>
                                    <th>User Name</th>
                                    <td>{{ $billing->first_name }} {{ $billing->last_name }}</td>                                 
                                </tr>								
							 	<tr>
                                    <th>Date</th>
                                    <td>{{ date('d-m-Y',strtotime($billing->created_at)) }}</td>                                 
                                </tr>
							 	<tr>
                                    <th>Txn Type</th>
                                    <td>{{ $billing->title }}</td>                                 
                                </tr>
								<tr>
                                    <th>Txn Id</th>
                                    <td>{{ $billing->txnid }}</td>                                 
                                </tr>
								<tr>
                                    <th>Entry Type</th>
                                    <td>{{ $billing->entryType }}</td>                                 
                                </tr>
							
								<tr>
                                    <th>Amount</th>
                                    <td>₹. {{ $billing->amount }}</td>                                 
                                </tr>
								<tr>
                                    <th>Status</th>
                                    <td><span class="badge  {{ $billing->status == 1 ? 'badge-success' : 'badge-warning' }}" >{{ $billing->status == 1 ? 'Confirmed' : 'Pending' }}</span></td>                                 
                                </tr>
							
								<tr>
                                    <th>Paid Via</th>
                                    <td>{{ $billing->transfer_mode }}</td>                                 
                                </tr>