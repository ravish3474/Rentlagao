<?php
if($this->session->userdata('userdata')){
	$userdata=$this->session->userdata('userdata');
	$my_user_id=$userdata[0]['user_id'];
}
else
{
	redirect(base_url());
}
?>
<style>

.inbox_people {
	background: #fff;
	float: left;
	overflow: hidden;
	width: 30%;
	border-right: 1px solid #ddd;
}

.inbox_msg {
	border: 1px solid #ddd;
	clear: both;
	overflow: hidden;
}

.top_spac {
	margin: 20px 0 0;
}

.recent_heading {
	float: left;
	width: 40%;
}

.srch_bar {
	display: inline-block;
	text-align: right;
	width: 60%;
	padding:
}

.headind_srch {
	padding: 10px 29px 10px 20px;
	overflow: hidden;
	border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
	color: #0465ac;
    font-size: 16px;
    margin: auto;
    line-height: 29px;
}

.srch_bar input {
	outline: none;
	border: 1px solid #cdcdcd;
	border-width: 0 0 1px 0;
	width: 80%;
	padding: 2px 0 4px 6px;
	background: none;
}

.srch_bar .input-group-addon button {
	background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	border: medium none;
	padding: 0;
	color: #707070;
	font-size: 18px;
}

.srch_bar .input-group-addon {
	margin: 0 0 0 -27px;
}

.chat_ib h5 {
	font-size: 15px;
	color: #464646;
	margin: 0 0 8px 0;
}

.chat_ib h5 span {
	font-size: 13px;
	float: right;
}

.chat_ib p {
    font-size: 12px;
    color: #989898;
    margin: auto;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chat_img {
	float: left;
	width: 11%;
}

.chat_img img {
	width: 100%
}

.chat_ib {
	float: left;
	padding: 0 0 0 15px;
	width: 88%;
}

.chat_people {
	overflow: hidden;
	clear: both;
}

.chat_list {
	border-bottom: 1px solid #ddd;
	margin: 0;
	padding: 18px 16px 10px;
}

.inbox_chat {
	height: 550px;
	overflow-y: scroll;
}

.active_chat {
	background: #e8f6ff;
}

.incoming_msg_img {
	display: inline-block;
	width: 6%;
}

.incoming_msg_img img {
	width: 100%;
}

.received_msg {
	display: inline-block;
	padding: 0 0 0 10px;
	vertical-align: top;
	width: 92%;
}

.received_withd_msg p {
	background: #ebebeb none repeat scroll 0 0;
	border-radius: 0 15px 15px 15px;
	color: #646464;
	font-size: 14px;
	margin: 0;
	padding: 5px 10px 5px 12px;
	width: 100%;
}

.time_date {
	color: #747474;
	display: block;
	font-size: 12px;
	margin: 8px 0 0;
}

.received_withd_msg {
	width: 57%;
}

.mesgs{
	float: left;
	padding: 30px 15px 0 25px;
	width:70%;
}

.sent_msg p {
	background:#0465ac;
	border-radius: 12px 15px 15px 0;
	font-size: 14px;
	margin: 0;
	color: #fff;
	padding: 5px 10px 5px 12px;
	width: 100%;
}

.outgoing_msg {
	overflow: hidden;
	margin: 26px 0 26px;
}

.sent_msg {
	float: right;
	width: 46%;
}

.input_msg_write input {
	background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	border: medium none;
	color: #4c4c4c;
	font-size: 15px;
	min-height: 48px;
	width: 100%;
	outline:none;
}

.type_msg {
	border-top: 1px solid #c4c4c4;
	position: relative;
}

.msg_send_btn {
	background: #05728f none repeat scroll 0 0;
	border:none;
	border-radius: 50%;
	color: #fff;
	cursor: pointer;
	font-size: 15px;
	height: 33px;
	position: absolute;
	right: 0;
	top: 11px;
	width: 33px;
}

.messaging {
	padding: 0 0 50px 0;
}

.msg_history {
	height: 516px;
	overflow-y: auto;
}
.chat_list{
	cursor: pointer;
}
</style>
<section class="container my-3">
	
<div class="messaging">
  <div class="inbox_msg">
	<div class="inbox_people">
	  <div class="headind_srch">
		<div class="recent_heading">
		  <h4>Recent</h4>
		</div>
		<div class="srch_bar">
		  <div class="stylish-input-group">
			<input type="text" class="search-bar"  placeholder="Search" >
			</div>
		</div>
	  </div>
	  <div class="inbox_chat scroll">
		<?php
		$userdata=$this->session->userdata('userdata');
		$my_id=$userdata[0]['user_id'];
		foreach ($fetch_chat_users as $users) {
			$seller_id=$users['seller_id'];
			$user_id=$users['user_id'];
			if($my_id==$seller_id){
				$main_id=$user_id;
			}
			else{
				$main_id=$seller_id;
			}
			$user_sql="SELECT * FROM users WHERE user_id='$user_id'";
			$query = $this->db->query($user_sql);
			$result = $query->result_array();
		?>
		<div class="chat_list" chat_id='<?=$users['chat_id']?>' users_id='<?=$main_id?>'>
		  <div class="chat_people">
			<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
			<div class="chat_ib">
			  <h5><?=$result[0]['nickname']?><span class="chat_date">Dec 25</span></h5>
<!-- 			  <p>Test, which is a new approach to have all solutions 
				astrology under one roof.</p> -->
			</div>
		  </div>
		</div>
	<?php } ?>
	  </div>
	</div>
	<div class="mesgs">
	  <div class="msg_history">
<!-- 		<div class="incoming_msg">
		  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
		  <div class="received_msg">
			<div class="received_withd_msg">
			  <p>Test which is a new approach to have all
				solutions</p>
			  <span class="time_date"> 11:01 AM    |    June 9</span></div>
		  </div>
		</div>
		<div class="outgoing_msg">
		  <div class="sent_msg">
			<p>Test which is a new approach to have all
			  solutions</p>
			<span class="time_date"> 11:01 AM    |    June 9</span> </div>
		</div>
		<div class="incoming_msg">
		  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
		  <div class="received_msg">
			<div class="received_withd_msg">
			  <p>Test, which is a new approach to have</p>
			  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
		  </div>
		</div>
		<div class="outgoing_msg">
		  <div class="sent_msg">
			<p>Apollo University, Delhi, India Test</p>
			<span class="time_date"> 11:01 AM    |    Today</span> </div>
		</div>
		<div class="incoming_msg">
		  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
		  <div class="received_msg">
			<div class="received_withd_msg">
			  <p>We work directly with our designers and suppliers,
				and sell direct to you, which means quality, exclusive
				products, at a price anyone can afford.</p>
			  <span class="time_date"> 11:01 AM    |    Today</span></div>
		  </div>
		</div>
				<div class="incoming_msg">
		  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
		  <div class="received_msg">
			<div class="received_withd_msg">
			  <p>Test, which is a new approach to have</p>
			  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
		  </div>
		</div>
		<div class="outgoing_msg">
		  <div class="sent_msg">
			<p>Apollo University, Delhi, India Test</p>
			<span class="time_date"> 11:01 AM    |    Today</span> </div>
		</div>
		<div class="incoming_msg">
		  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
		  <div class="received_msg">
			<div class="received_withd_msg">
			  <p>We work directly with our designers and suppliers,
				and sell direct to you, which means quality, exclusive
				products, at a price anyone can afford.</p>
			  <span class="time_date"> 11:01 AM    |    Today</span></div>
		  </div>
		</div> -->
	  </div>
	  <div class="type_msg">
		<div class="input_msg_write">
		  <input type="text" class="write_msg" placeholder="Type a message" />
		  <button class="msg_send_btn sender_btn" to_user="" chat_id="" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		</div>
	  </div>
	</div>
  </div>
</div>

</section>
<script type="text/javascript">
$(document).on('click','.sender_btn',function(){
	var to_user=$(this).attr('to_user');
	var chat_id=$(this).attr('chat_id');
	var message=$('.write_msg').val();
	if (message.length==0) {
		swal('Sorry','Message Field Cannot Be Left Blank','warning');
	}
	else{
		$.ajax({
			type:'POST',
			data:{
				to_user:to_user,
				chat_id:chat_id,
				message:message
			},
			url:'<?=base_url()?>WebController/insert_message',
			success:function(response){
				var response = JSON.parse(response);
				if (response.status!=1) {
					swal('OOPS','Something Went Wrong','warning');
				}
				else{
					var html='';
					html+='<div class="outgoing_msg">'+
					  '<div class="sent_msg">'+
						'<p>'+message+'</p>'+
						'<span class="time_date"> 11:01 AM    |    Today</span> </div>'+
					'</div>';
					$('.msg_history').append(html);
					$('.write_msg').val(" ");
				}
			}
		})
	}
})

	$(document).on('click','.chat_list',function(){
		var el=$(this);
		$('.chatlist').removeClass('active_chat');
		el.addClass('active_chat');
		var chat_id = $(this).attr('chat_id');
		var other_user_id=$(this).attr('users_id');
		$('.sender_btn').attr('to_user',other_user_id);
		$('.sender_btn').attr('chat_id',chat_id);
		var my_id=<?=$my_user_id?>;
		$.ajax({
			type:'POST',
			data:{
				chat_id:chat_id,
			},
			url:'<?=base_url()?>WebController/fetch_chat_by_id',
			success:function(response){
				var response=JSON.parse(response);
				var html='';
				for(var i=0;i<response.length;i++){
					if(response[i].from_msg==my_id){
						html+='<div class="outgoing_msg">'+
						  '<div class="sent_msg">'+
							'<p>'+response[i].message+'</p>'+
							'<span class="time_date"> 11:01 AM    |    June 9</span> </div>'+
						'</div>';
					}
					else{
						html+='<div class="incoming_msg">'+
						  '<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>'+
						  '<div class="received_msg">'+
							'<div class="received_withd_msg">'+
							  '<p>'+response[i].message+'</p>'+
							  '<span class="time_date"> 11:01 AM    |    June 9</span></div>'+
						  '</div>'+
						'</div>';
					}
				}
				$('.msg_history').empty();
				$('.msg_history').append(html);
			}
		})
	})
</script>