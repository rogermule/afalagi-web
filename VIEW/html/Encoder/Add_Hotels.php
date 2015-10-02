<?php
	include("Encoder_Header.php");

	include "Encoder_Menu.html";
?>


<!--start of, adding company-->

		<div class="col-sm-8 list_container margin_0">

		<div class="col-sm-12">

		<div class="panel panel-default">
		    <div class="panel-body text-center">
		        <h4>Add Hotel</h4>

		    </div>
		</div>

		<div class=" margin_top_20">

		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">Company Address</h3>
		    </div>
		    <div class="panel-body">
		        <form class="form-horizontal" role="form"
		              action="../../../CONTROLLER/Admin_Edit_User.php" method="POST">


		            <div class="form-group">
		                <label for="Region" class="col-sm-4 control-label">Region</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="Region">
		                        <option>Select Region</option>
		                        <option>Amhara</option>
		                        <option>Afar</option>
		                        <option>Benshangul</option>
		                        <option>Debub</option>
		                        <option>Somaliya</option>
		                        <option>Ormoiya</option>
		                        <option>Tigray</option>

		                    </select>
		                </div>
		                <div class="col-sm-2">
		                    <div class="btn btn-info">new</div>
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="City" class="col-sm-4 control-label">City</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="City">
		                        <option>Select city</option>
		                        <option>Addis Ababa</option>
		                        <option>Jigjiga</option>
		                        <option>Jimma</option>
		                        <option>BahirDar</option>
		                        <option>Wello</option>
		                        <option>Axum</option>
		                        <option>Mekele</option>

		                    </select>
		                </div>
		                <div class="col-sm-2">
		                    <div class="btn btn-info">new</div>
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="Sub_City" class="col-sm-4 control-label">Sub City</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="Sub_City">
		                        <option>Select Sub City</option>
		                        <option>Kirkos</option>
		                        <option>Nifas Silk Lafto</option>
		                        <option>Bole</option>


		                    </select>
		                </div>
		                <div class="col-sm-2">
		                    <div class="btn btn-info">new</div>
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="Kebele_Wereda" class="col-sm-4 control-label">Kebele/Wereda</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="Kebele_Wereda">
		                        <option>Selece Kebele/wereda</option>
		                        <option>1</option>
		                        <option>2</option>
		                        <option>3</option>
		                        <option>4</option>
		                        <option>5</option>
		                    </select>
		                </div>
		                <div class="col-sm-2">
		                    <div class="btn btn-info">new</div>
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="Sefer" class="col-sm-4 control-label">Sefer</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="Sefer">
		                        <option>Select Sefer</option>
		                        <option>Jemo 1</option>
		                        <option>Lebu</option>
		                        <option>CMC</option>
		                        <option>Ayer Tena</option>
		                    </select>
		                </div>
		                <div class="col-sm-2">
		                    <div class="btn btn-info">new</div>
		                </div>
		            </div>


			        <div class="form-group">
				        <label for="Different_Identification"
				               class="col-sm-4 control-label">Direction</label>
				        <div class="col-sm-5">
					        <input name="Different_Identification" type="text" class="form-control"
					               id="Enter Direction"
					               placeholder="Enter Different Identification" >
				        </div>
			        </div>

			        <div class="form-group">
				        <label for="Different_Identification"
				               class="col-sm-4 control-label">አቅጣጫ
				        </label>
				        <div class="col-sm-5">
					        <input name="Different_Identification" type="text" class="form-control"
					               id="Enter Direction"
					               placeholder="አቅጣጫ ያሰገቡ" >
				        </div>
			        </div>

		            <hr>

		            <div class="form-group">
		                <label for="Building" class="col-sm-4 control-label">Building</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="Building">
		                        <option>Select Building</option>
		                        <option>Friendship</option>
		                        <option>Denbel</option>
		                        <option>Getu</option>
		                    </select>
		                </div>
		                <div class="col-sm-2">
		                    <div class="btn btn-info">new</div>
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="Building_Floor" class="col-sm-4 control-label">Building Floor</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="Building_Floor">
		                        <option>Select Floor</option>
		                        <option>The Whole Building</option>
		                        <option>Ground</option>
		                        <option>1 Floor</option>
		                        <option>2 Floor</option>
		                        <option>3 Floor</option>
		                        <option>4 Floor</option>

		                    </select>
		                </div>

		            </div>

			        <div class="form-group">
				        <label for="Building_Floor" class="col-sm-4 control-label">Street Name</label>
				        <div class="col-sm-5">
					        <input name="User_Name" type="text" class="form-control"
					               id="House_NO" placeholder="Enter Road Name" >
				        </div>
			        </div>
			        <div class="form-group">
				        <label for="Building_Floor" class="col-sm-4 control-label">መንገድ ሰም </label>
				        <div class="col-sm-5">
					        <input name="User_Name" type="text" class="form-control"
					               id="House_NO" placeholder="መንገድ ሰም ያሰገቡ" >
				        </div>
			        </div>

		            <hr>

		            <div class="form-group">
		                <label for="POBOX" class="col-sm-4 control-label">PO-BOX</label>
		                <div class="col-sm-5">
		                    <input name="User_Name" type="text" class="form-control"
		                           id="POBOX" placeholder="Enter POBOX" >
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="Phone" class="col-sm-4 control-label">Phone</label>
		                <div class="col-sm-5">
		                    <input name="User_Name" type="text" class="form-control"
		                           id="Phone" placeholder="Enter Phone" >
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="FAX" class="col-sm-4 control-label">FAX</label>
		                <div class="col-sm-5">
		                    <input name="User_Name" type="text" class="form-control"
		                           id="FAX" placeholder="Enter FAX" >
		                </div>
		            </div>

		            <div class="form-group">
		                <label for="Email" class="col-sm-4 control-label">Email</label>
		                <div class="col-sm-5">
		                    <input name="User_Name" type="text" class="form-control"
		                           id="Email" placeholder="Enter Email" >
		                </div>
		            </div>

		        </form>
		    </div>
		</div>



		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">Company Name And work Description</h3>
		    </div>
		    <div class="panel-body">
		        <form class="form-horizontal" role="form"
		              action="../../../CONTROLLER/Admin_Edit_User.php" method="POST">


			        <div class="form-group">
				        <label for="Company_Name" class="col-sm-4 control-label">Hotel Name</label>
				        <div class="col-sm-5">
					        <input name="User_Name" type="text" class="form-control"
					               id="Company_Name" placeholder="Enter Company Name" >
				        </div>
			        </div>
			        <div class="form-group">
				        <label for="Company_Name" class="col-sm-4 control-label">የድርጅቱ ስም</label>
				        <div class="col-sm-5">
					        <input name="User_Name" type="text" class="form-control"
					               id="Company_Name" placeholder="የድርጅቱ ስም ያሰገቡ " >
				        </div>
			        </div>


			        <div class="form-group">
		                <label for="Star" class="col-sm-4 control-label">Star</label>
		                <div class="col-sm-5">
		                    <select class="form-control" id="Star">
		                        <option>1 star</option>
		                        <option>2 star</option>
		                        <option>3 star</option>
		                        <option>4 star</option>
		                        <option>5 star</option>
		                        <option>6 star</option>
		                     </select>
		                </div>

		            </div>


			        <div class="form-group">
				        <label for="Company_Discription"
				               class="col-sm-4 control-label">Company Services</label>
				        <div class="col-sm-5">

					        <textarea name="User_Name" class="form-control"
					                  rows="3"  id="Company_Discription"
					                  placeholder="Enter Company Description"></textarea>

				        </div>
			        </div>
			        <div class="form-group">
				        <label for="Company_Discription"
				               class="col-sm-4 control-label">የስራ ውጤት ማብራርያ</label>
				        <div class="col-sm-5">

					        <textarea name="User_Name" class="form-control"
					                  rows="3"  id="Company_Discription"
					                  placeholder="የስራ ውጤት ማብራርያ ያስገቡ"></textarea>

				        </div>
			        </div>





			        <div class="form-group">
		                <label for="Branch" class="col-sm-4 control-label">Branch</label>
		                <div class="col-sm-5">
		                    <input name="User_Name" type="text-a" class="form-control"
		                           id="Branch" placeholder="Enter Branch" >
		                </div>
		            </div>


			        <div class="form-group">
				        <label for="Branch" class="col-sm-4 control-label">ቅርንጫፍ</label>
				        <div class="col-sm-5">
					        <input name="User_Name" type="text-a" class="form-control"
					               id="Branch" placeholder="ቅርንጫፍ ያስገቡ" >
				        </div>
			        </div>



		            <div class="form-group margin_top_30">

		                <div class="col-sm-5 col-lg-offset-4">
		                    <button type="submit" class="btn btn-success btn-block">
		                        <strong>Add Company</strong>
		                    </button>
		                </div>
		            </div>


		        </form>
		    </div>
		</div>



		</div>

		</div>

		</div>

<?php
	include("Encoder_Footer.php");
?>