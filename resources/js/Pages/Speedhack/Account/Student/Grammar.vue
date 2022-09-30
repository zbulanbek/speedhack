<template>
	<account-layout>
    	<section class="bg-account">
    		<div class="account-title">
    			<img src="/images/icons/arrow-left-blue.svg"><span>General English</span>
    		</div>
    		<div class="grammer-wrap">
            	<span class="title"> Present Tense. To be. Positive</span>
            	<p class="topic">Elementary</p>
            	<p class="text"> «To be» is a useful word.
            		<br> It has different meanings and can help you to make simple sentences
            	</p>
            	<div class="img">
            		<img src="/images/ilustration/404.png">
            	</div>

				<p class="text">Examples</p>
                <table>
                <tr>
                    <th> Full Forms</th>
                    <th> Short Forms</th>

                </tr>
                    <tr>
                        <td>
                            <b>I am </b>a manager.<br>
                            <b>You are</b> so kind!<br>
                            <b>He is </b>a good guy.<br>
                            <b>She is</b> fine.<br>
                            <b>It is</b> OK.<br>
                            <b>We are</b> the champions!<br>
                            <b>They are </b>at work.
                        </td>
                         <td>
                          <b>I'm</b> a manager.<br>
                            <b>You're </b>so kind!<br>
                            <b>He's</b> a good guy.<br>
                            <b>She's</b> fine.<br>
                            <b>It's</b> OK.<br>
                            <b>We're</b> the champions!<br>
                            <b>They're</b> at work.
                        </td>

                    </tr>
                </table>



            	<div class="wrap-blocks">
            		<div>
            			<p class="text">Forms<br> To BE in positives (+)</p>
            			<table class="main-tabel">
			                <tr>
			                    <td>
			                    	<br>
			                        I <b>am...</b><br>
			                    </td>
			                    <td>
			                      	He<br>
									She  &nbsp;&nbsp;&nbsp;<b>is...</b><br>
									It<br>
			                    </td>
			                	<td>
			                      	You<br>
			                      	We &nbsp;&nbsp;&nbsp;<b>are...</b><br>
									They <br>
								</td>
			                </tr>
		                </table>
            		</div>

	                <div>
	                	<p class="text">Remember</p>
	                	<ul>
		                   	<li><b>You</b> = for one person and many people</li>
		                    <li> It = for one thing, NOT people (a city = it, a tomato = it)</li>
		                    <li>They = for people and things (cities = they, children = they)</li>
		                </ul>
	                </div>
	            </div>

            	<p class="text">Usage</p>
            	<ul>
                   	<li><b>Jobs</b> <br> She is an IT specialist.</li>
                    <li><b>Places</b>  <br>The kids are at school.</li>
                    <li><b>Ages</b> <br> James is 36 years old.</li>
                </ul>

                <p class="text-bold">More from this folder</p>

                <div class="files" >
                	<a href="#"> <img src="/images/icons/file.svg">  Present Tense. To be. Negatives & Questions</a>
                	<a href="#"> <img src="/images/icons/file.svg"> Present Perfect Continuous</a>
                </div>

        	</div>
    	</section>
    </account-layout>
</template>
<script>
	export default {
	    components: {

	    },
	    data() {
	        return {
	        }
	    }
	}
</script>
<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    }
	.account-title{
		font-family: "Inter-Bold", sans-serif;
		padding: 30px 20px;
		font-weight: 600;
		color: #050A1C;
		font-size: 24px;
		border-bottom: 1px solid #E0E3EB;
		margin-bottom: 30px;
	}
	.account-title img{
		margin-right: 16px;
	}
	.account-title{
		font-family: "Inter-Bold", sans-serif;
		padding: 30px 20px;
		font-weight: 600;
		color: #050A1C;
		font-size: 24px;
	}
	.account-title img{
		margin-right: 16px;
	}
	.grammer-wrap{
		background: #FFFFFF;
	    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
	    border-radius: 8px;
	    margin-left: 60px;
	    margin-right: 60px;
	    padding: 50px;
	    margin-bottom: 60px;
	}
	.grammer-wrap .title{
		font-family: "Inter-Bold", sans-serif;
		font-size: 32px;
		line-height: 45px;
	}
	.topic{
		font-family: "Inter", sans-serif;
		font-size: 20px;
		color: #003ECB;
		margin-bottom: 40px;
	}
	.text{
		font-family: "Inter", sans-serif;
		color: #050A1C;
		font-size: 20px;
		margin-bottom: 20px;
	}
	.img{
		width: 50%;
		height: 250px;
		overflow: hidden;
		border-radius: 8px;
		margin-bottom: 16px;
	}
	.img img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}



	table{
		border-collapse: separate;
	   	border-radius: 8px;
	   	margin-bottom: 40px;
	}

	th {
	  	font-variant-position:super;
	 	border: 1px solid #E36018;
	 	color: #050A1C;
	 	border-bottom: none;
	 	border-left: none;
	 	font-size: 20px;
	 	font-family: "Inter", sans-serif;
	 	text-align: center;
    }
    th:first-child{
		border-left: 1px solid #E36018;
	}

    tr:last-child td:first-child{
    	border-bottom-left-radius: 8px;
    }
    tr:last-child td:last-child{
    	border-bottom-right-radius: 8px;
    }
    th:first-child {
    	border-top-left-radius: 8px;
    }
    th:last-child {
    	border-top-right-radius: 8px;
    }
	td{
	  	text-align: left;
	  	padding: 16px;
	    font-variant-position:super;
	 	border: 1px solid #E36018;
	 	border-left: none;
	 	font-family: "Inter", sans-serif;
	}
	td:first-child{
		border-left: 1px solid #E36018;
	}
	td b{
		font-family: "Inter-Bold", sans-serif;
	}
	table.main-tabel tr:first-child td:first-child{
		border-top-left-radius: 8px;
	}
	table.main-tabel tr:first-child td:last-child{
		border-top-right-radius: 8px;
	}


	ul {
	  list-style: none;
	  margin-bottom: 40px;
	}
	ul li::before {
	    color: #E36018;
	    content: "\2022";
	  	font-weight: bold;
	  	display: inline-block;
	 	width: 1em;
	  	margin-left: -1em;
	}
	.wrap-blocks{
		display: flex;
		justify-content: space-between;
	}

	.text-bold{
		font-family: "Inter-Bold", sans-serif;
		font-size: 22px;
		line-height: 31px;
		margin-bottom: 12px;
	}

	.files{
		margin-bottom: 16px;
		display: flex;
		flex-direction: column;
	}
	.files a {
		font-family: "Inter", sans-serif;
		font-size: 16px;
		color: #E36018;
		display: flex;
		align-items: center;
		margin-bottom: 10px;
	}
	.files a img{
		margin-right: 10px;
	}
	@media only screen and (max-width: 1366px)  and (min-width: 1024px){
		.wrap-blocks{
			flex-wrap: wrap;
		}
	}
	@media only screen and (max-width: 1024px)  and (min-width: 768px){
		.grammer-wrap{
			margin-left: 30px;
    		margin-right: 30px;
		}
		.wrap-blocks{
			flex-wrap: wrap;
		}
	}
	@media only screen and (max-width: 767px) {
		.wrap-blocks{
			flex-wrap: wrap;
		}
		.grammer-wrap{
			margin-left: 20px;
    		margin-right: 20px;
    		padding: 30px 20px;
		}
		.img{
			width: 100%;
		}
	}
</style>
