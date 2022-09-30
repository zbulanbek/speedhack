<template>
	<section>
			<div class="table-wrap">
			<table>
                <tr>
                    <th colspan="4"> 
                        <div class="letters">
                        	<a href="#i0"> A</a> 
                        	<a href="#i1">B</a> 
                        	<a href="#i2">C</a> 
                        	<a href="#i3">D</a> 
                        	<a href="#i4">E</a>
                        	<a href="#i5"> F</a>
                        	<a href="#i6"> G</a>
                        	<a href="#i7"> H</a> 
                        	<a href="#i8">I</a>
                        	<a href="#i9"> J</a>
                        	<a href="#i10"> K</a>
                        	<a href="#i11"> L</a>
                        	<a href="#i12"> M</a>
                        </div>
                        <div class="letters">
                        	<a href="#i13"> N</a>
                        	<a href="#i14"> O</a>
                        	<a href="#i15"> P</a>
                        	<a href="#i16"> Q</a>
                        	<a href="#i17"> R</a>
                        	<a href="#i18"> S</a>
                        	<a href="#i19"> T</a>
                        	<a href="#i20"> U</a>
                        	<a href="#i21"> V</a>
                        	<a href="#i22"> W</a>
                        	<a href="#i23"> X</a>
                        	<a href="#i24"> Y</a>
                        	<a href="#i25"> Z</a>
                       	</div>
                    </th>
                </tr>
                <tr id="#i0">
                    <td><b>A</b></td>
                    <td> aback </td>
                    <td> [əˈbæk] </td>
                    <td> назад, сзади, задом </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td> abaction</td>
                    <td> [æbˈækʃən] </td>
                    <td> крупная кража угон скота </td>
                </tr>
                 <tr>
                    <td>  </td>
                    <td>abacus </td>
                    <td>  [ˈæbəkəs]</td>
                    <td> счеты, абак, абака, мозаичная панель </td>
                </tr>
                
                <tr id="#i1">
                    <td> <b>B </b></td>
                    <td>beaconage </td>
                    <td> [ˈbiːkənɪdʒ] </td>
                    <td> сбор за содержание бакенов и маяков  </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td>beacon </td>
                    <td> [ˈbiːkən]  </td>
                    <td> маяк, радиомаяк, сигнальный фонарь, бакен </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td>beacon </td>
                    <td> [ˈbiːkən]  </td>
                    <td> маяк, радиомаяк, сигнальный фонарь, бакен </td>
                </tr>
               <tr>
                    <td>  </td>
                    <td>beacon </td>
                    <td> [ˈbiːkən]  </td>
                    <td> маяк, радиомаяк, сигнальный фонарь, бакен </td>
                </tr>
                <tr id="#i2">
                    <td> <b>C</b> </td>
                    <td> cabalistic</td>
                    <td>  [ˌkæbʌˈlɪstɪk]</td>
                    <td> кабалистический, таинственный, мистический </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td> cabbie</td>
                    <td> [ˈkæbi] </td>
                    <td> таксист, извозчик </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td>cicatrix </td>
                    <td> [ˈsɪkətrɪks] </td>
                    <td> рубец, шрам, рубчик </td>
                </tr>
            </table>
        	</div>
	</section>
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
	.title-page{
		padding: 30px 60px;
	}
	.title-page span{
		font-size: 24px;
		font-family: "Inter-Bold", sans-serif;
		color: #050A1C;
	}
	.tab-wrap{
		border-bottom: 1px solid #E0E3EB;
		display: flex;
		padding-right: 60px;
		padding-left: 60px;
		margin-bottom: 46px;
	}
	.tab-wrap .item{
		padding: 8px 0px;
		font-size: 18px;
		font-family: "Inter", sans-serif;
		color: rgb(123, 131, 139);
		margin-right: 40px;
		margin-bottom: -1px;
	}
	.tab-wrap .item.active{
		color: #003ECB;
		border-bottom: 1px solid #003ECB;
	}
	.table-wrap{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		margin-left: 60px;
		margin-right: 60px;
		margin-bottom: 40px;
		padding-bottom: 20px;
	}

	table{
		width: 100%;
	}
	th {
		font-size: 44px;
      	letter-spacing: 0.5em;
		color: #003ECB;
		font-family: "Inter-Bold", sans-serif;
		padding-top: 20px;
		padding-bottom: 20px;
    }
    th a{
    	color: #003ECB;
    	padding-left: 8px;
    	padding-right: 8px;		
    }
    .letters{
    	display: flex;
    	align-items: center;
    	justify-content: center;
    }
	td{
  		text-align: left;
  		padding: 2px 0px 2px 124px; 
		font-family: "Inter", sans-serif;
		font-size: 20px;
   		color: #050A1C;
	}
	td:first-child{
	color: #003ECB;
	padding-left: 60px;
	}

	tr:nth-child(even) {
	  background-color: #F9F9FA;
	}

	td b{
		font-family: "Inter-Bold", sans-serif;
		color: #003ECB;
	}
	td:nth-child(2){
		padding-left: 90px;
	}
	td:nth-child(3){
		padding-left: 100px;
	}
	td:last-child{
		padding-left: 90px;
		padding-right: 20px;
	}
    @media only screen and (max-width: 1024px)  and (min-width: 768px){
        .tab-wrap{
            padding-right: 20px;
            padding-left: 20px;
            overflow-x: auto;
        }
         .table-wrap{
            margin-left: 20px;
            margin-right: 20px;
            overflow: auto;
            padding-bottom: 40px;
        }
        td{
            padding: 2px 0px 2px 64px;
        }
        td:first-child{
            padding-left: 30px;
        }
        td:last-child{
            padding-left: 30px;
            padding-right: 20px;
        }
        th{
            padding-left: 20px;
            padding-right: 20px;
        }
        .title-page{
            padding: 30px 20px;
        }
    }
    @media only screen and (max-width: 767px) {
        .title-page{
            padding: 30px 20px;
        }
        .tab-wrap{
            padding-right: 20px;
            padding-left: 20px;
        }
        .table-wrap{
            margin-left: 20px;
            margin-right: 20px;
            overflow: auto;
            padding-bottom: 40px;
        }

        td{
            padding: 2px 0px 2px 64px;
        }
        td:first-child{
            padding-left: 30px;
        }
        td:last-child{
            padding-left: 30px;
            padding-right: 20px;
        }
        th{
            padding-left: 20px;
            padding-right: 20px;
        }
    }
</style>