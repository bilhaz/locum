<!DOCTYPE html>
<html>
 <head>
	<title>Order Invoice</title>
  <style>
 *{border-sizing:border-box}
  body{
	font-family:arial,verdana,sans-serif;
	margin:0px;
	font-size:11px;
  }
  p,h1,h2{margin:0px;}
  .printArea{
	width:80mm;
	padding:5px;
	margin:0px auto;
	border:1px dashed #f5f5f5;
  }
  h1{font-size:16px}
  p{font-size:11px}
  .invoiceTable	thead tr th{border-bottom:1px dotted #000}
  
  .bottomBorder td{border-bottom:1px dotted #000}
  </style>
 </head>
 
 <body>
	<div class="printArea">
		<p align="right"><?=date('D, M d,Y',strtotime($ordersdetail[0]->date))?></p>
                <h1 align="center"><img width="40px" src="<?=site_url('assets/imgs/logo.png')?>" style="float:left">Pyzie</h1>
                <p align="Center">(+92-348-235-7857)</p>
<hr>        
<table>
<tr>
    <th><u>Name:</u></th>
 <td><?=$ordersdetail[0]->customerName?></td>
 <th><u>Contact:</u></th>
 <td><?=$ordersdetail[0]->Contact?></td>
  
</tr>

<tr>
 <th align="left" width="10%"><u>Address:</u></th>
 <td><?=$ordersdetail[0]->address?></td>
</tr>
</table>
<hr>
   <table border="0" width="100%" align="center">
		<tr>
			<td align="right" width="5%"><strong>Order#</strong></td>
			<td><strong><?=$ordersdetail[0]->orderNo?></strong></td>
			<td align="right"<?=date('d M ,Y',strtotime($ordersdetail[0]->date))?></td>
		</tr>
	</table>
	<p><u>Sale</u></p>
	<table width="100%" border="0" class="invoiceTable">
		<thead>
		 <tr>
			<th></th>
			<th>ITEM</th>
			<th>QTY</th>
			<th>PRICE</th>
			<th>AMOUNT</th>
		 </tr>
		</thead>
	<tbody>
    <?php $i=1; $total=0; foreach($ordersdetail as $orderdetail): ?>
                                                                 <tr>
                                                                     <td><?=$i++?></td>
                                                                     <td><?php echo $orderdetail->productTitle?></td>
                                                                     <td align="right"><?php echo $orderdetail->quantity?></td>
                                                                     <td align="right"><?php echo $orderdetail->price?></td>
                                                                     <td align="right"><?php $total+=($orderdetail->quantity * $orderdetail->price);echo $orderdetail->quantity * $orderdetail->price; ?></td>
                                                                 </tr>        
                                                             <?php endforeach; ?>
		 
        <tr class="bottomBorder">
			<td></td>
			<td></td>
			<td></td>
			<td align="right"></td>
			<td align="right"></td>
		 </tr>
         <tr>
			<td colspan="4" align="right"><strong>Subtotal:</strong></td>
			<td align="right"><strong><?=$total?></strong></td>
		 </tr>
	<tr>
			<td colspan="4" align="right"><strong>Delivery:</strong></td>
			<td align="right"><strong><?php echo $orderdetail->devCharges; $total+=$orderdetail->devCharges;  ?></strong></td>
		 </tr>
		<tr>
			<td colspan="4" align="right"><strong>Total:</strong></td>
			<td align="right"><strong><?=$total?></strong></td>
		 </tr>
	</tbody>
	</table>
	<!--<p>Prepared By: <strong>Dr. Hassan Muhammad</strong></p>-->
	<p style="margin-top:10px;">Note:</p>
	<table border="0" width="100%">
		<tr>
			<td width="5%">1-</td>
			<td>
			Items once sold could be returned withing 7 days upon presenting orignal receipt
			</td>
		</tr>
		<tr>
			<td>2-</td>
			<td>
			Temprature sensitive or fridge items will not be returned
			</td>
		</tr>
		
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		
		<tr>
			<td colspan="2">Stamp:</td>
		</tr>
	</table>
	
	<p style="margin-top:50px;font-size:9px;">Developed & maintened by www.innovisionsoft.com 03028815412
	</p>
    </div>
    <div class="hideMeInPrint">
    <button type="button" class="btn btn-info" onclick="myFunction()"><span class="fa fa-print">Print</span></button>
     <!--<a href="<?=  site_url('consale/salnew')?>" class="btn btn-success"> Close</a>-->
  </div>
  <script>
    function myFunction(){
        window.print();
    }
    </script>
 </body>
</html>