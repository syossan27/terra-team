$(function(){
    $('.select').select2();

		$.cookie.json = true;

		$('#character select').change(function(){
			var display_val = $(this).attr('id');
			var job	= $(this).val();

			if ( job == "none" ) {

				// ステータスのとこ消す
				switch( display_val ) {
					case 'chara1':
						target_elm = "#first-status";
						break;
					case 'chara2':
						target_elm = "#second-status";
						break;
					case 'chara3':
						target_elm = "#third-status";
						break;
					case 'chara4':
						target_elm = "#fourth-status";
						break;
					case 'chara5':
						target_elm = "#fifth-status";
						break;
					case 'chara6':
						target_elm = "#sixth-status";
						break;
				}

				telm = $(target_elm + " > .left-status-box > table > tbody > tr");
				telm.children(".hp").text("");
				telm.children(".atk").text("");
				telm.children(".def").text("");
				telm.children(".matk").text("");
				telm.children(".mdef").text("");
				telm = $(target_elm + " > .center-status-box > table > tbody > tr");
				telm.children(".first-skill").text("");
				telm.children(".second-skill").text("");
				telm.children(".third-skill").text("");
				telm.children(".fourth-skill").text("");
				$(target_elm + " .first-slot").val("none");
				$(target_elm + " .second-slot").val("none");
				$(target_elm + " .third-slot").val("none");
				$(target_elm + " .fourth-slot").val("none");
				$(target_elm + " .first-slot option[value!='none']").remove();
				$(target_elm + " .second-slot option[value!='none']").remove();
				$(target_elm + " .third-slot option[value!='none']").remove();
				$(target_elm + " .fourth-slot option[value!='none']").remove();
				$(target_elm + " > span > img").attr("src", "")
																			 .css("width", 0)
																			 .css("height", 0)
																			 .css("margin-left", 0);

				if ( $("#select2-chosen-1").text() == "-" &&
						 $("#select2-chosen-2").text() == "-" &&
						 $("#select2-chosen-3").text() == "-" &&
						 $("#select2-chosen-4").text() == "-" &&
						 $("#select2-chosen-5").text() == "-" &&
						 $("#select2-chosen-6").text() == "-" ) 
				{
						total_elm = $("#total-status > .left-status-box > table > tbody > tr")
						total_elm.children(".hp").text("");
						total_elm.children(".atk").text("");
						total_elm.children(".def").text("");
						total_elm.children(".matk").text("");
						total_elm.children(".mdef").text("");
				}
				
			} else {

				// ajax飛ばしてステータスゲット
				$.ajax({
					url: '/search_status',
					type: 'POST',
					data: 'job='+job,
					success: function(return_data) {

						// 各ステータスをボックスに追加
						switch( display_val ) {
							case 'chara1':
								target_elm = "#first-status";
								break;
							case 'chara2':
								target_elm = "#second-status";
								break;
							case 'chara3':
								target_elm = "#third-status";
								break;
							case 'chara4':
								target_elm = "#fourth-status";
								break;
							case 'chara5':
								target_elm = "#fifth-status";
								break;
							case 'chara6':
								target_elm = "#sixth-status";
								break;
						}

						// ステータス挿入
						telm = $(target_elm + " > .left-status-box > table > tbody > tr");
						telm.children(".hp").text(return_data['job_data'][0]['lv_max_hp']);
						telm.children(".atk").text(return_data['job_data'][0]['lv_max_atk']);
						telm.children(".def").text(return_data['job_data'][0]['lv_max_def']);
						telm.children(".matk").text(return_data['job_data'][0]['lv_max_matk']);
						telm.children(".mdef").text(return_data['job_data'][0]['lv_max_mdef']);

						// スキル挿入
						telm = $(target_elm + " > .center-status-box > table > tbody > tr");
						telm.children(".first-skill").text(return_data['job_data'][0]['first_skill']);
						telm.children(".second-skill").text(return_data['job_data'][0]['second_skill']);
						telm.children(".third-skill").text(return_data['job_data'][0]['third_skill']);
						telm.children(".fourth-skill").text(return_data['job_data'][0]['fourth_skill']);

						// スロットスキル挿入
						telm = $(target_elm + " > .right-status-box > table > tbody > tr > td");
						for ( var i = 0; i < return_data['slot_skill'].length; i++ ) {
							telm.children(".first-slot").append($('<option>').html(return_data['slot_skill'][i]).val(i));
							telm.children(".second-slot").append($('<option>').html(return_data['slot_skill'][i]).val(i));
							telm.children(".third-slot").append($('<option>').html(return_data['slot_skill'][i]).val(i));
							telm.children(".fourth-slot").append($('<option>').html(return_data['slot_skill'][i]).val(i));
						}

						// サムネイル挿入
						$(target_elm + " > span > img")
							.attr({
							 src: "/img/thumb/"+return_data['job_data'][0]['image'],
							 align: "left"
							})
							.css('width', '30px')
							.css('height', '30px')
							.css('margin-right', '25px');

						// 総合ステータスの更新
						var total_status = {'hp':0, 'atk':0, 'def':0, 'matk':0, 'mdef':0};

						first_elm = $("#first-status > .left-status-box > table > tbody > tr");
						if (first_elm.children(".hp").text()) {
							total_status['hp'] += parseInt(first_elm.children(".hp").text());
							total_status['atk'] += parseInt(first_elm.children(".atk").text());
							total_status['def'] += parseInt(first_elm.children(".def").text());
							total_status['matk'] += parseInt(first_elm.children(".matk").text());
							total_status['mdef'] += parseInt(first_elm.children(".mdef").text());
						}

						second_elm = $("#second-status > .left-status-box > table > tbody > tr");
						if (second_elm.children(".hp").text()) {
							total_status['hp'] += parseInt(second_elm.children(".hp").text());
							total_status['atk'] += parseInt(second_elm.children(".atk").text());
							total_status['def'] += parseInt(second_elm.children(".def").text());
							total_status['matk'] += parseInt(second_elm.children(".matk").text());
							total_status['mdef'] += parseInt(second_elm.children(".mdef").text());
						}

						third_elm = $("#third-status > .left-status-box > table > tbody > tr");
						if (third_elm.children(".hp").text()) {
							total_status['hp'] += parseInt(third_elm.children(".hp").text());
							total_status['atk'] += parseInt(third_elm.children(".atk").text());
							total_status['def'] += parseInt(third_elm.children(".def").text());
							total_status['matk'] += parseInt(third_elm.children(".matk").text());
							total_status['mdef'] += parseInt(third_elm.children(".mdef").text());
						}

						fourth_elm = $("#fourth-status > .left-status-box > table > tbody > tr");
						if (fourth_elm.children(".hp").text()) {
							total_status['hp'] += parseInt(fourth_elm.children(".hp").text());
							total_status['atk'] += parseInt(fourth_elm.children(".atk").text());
							total_status['def'] += parseInt(fourth_elm.children(".def").text());
							total_status['matk'] += parseInt(fourth_elm.children(".matk").text());
							total_status['mdef'] += parseInt(fourth_elm.children(".mdef").text());
						}

						fifth_elm = $("#fifth-status > .left-status-box > table > tbody > tr");
						if (fifth_elm.children(".hp").text()) {
							total_status['hp'] += parseInt(fifth_elm.children(".hp").text());
							total_status['atk'] += parseInt(fifth_elm.children(".atk").text());
							total_status['def'] += parseInt(fifth_elm.children(".def").text());
							total_status['matk'] += parseInt(fifth_elm.children(".matk").text());
							total_status['mdef'] += parseInt(fifth_elm.children(".mdef").text());
						}

						sixth_elm = $("#sixth-status > .left-status-box > table > tbody > tr");
						if (sixth_elm.children(".hp").text()) {
							total_status['hp'] += parseInt(sixth_elm.children(".hp").text());
							total_status['atk'] += parseInt(sixth_elm.children(".atk").text());
							total_status['def'] += parseInt(sixth_elm.children(".def").text());
							total_status['matk'] += parseInt(sixth_elm.children(".matk").text());
							total_status['mdef'] += parseInt(sixth_elm.children(".mdef").text());
						}

						total_elm = $("#total-status > .left-status-box > table > tbody > tr")
						total_elm.children(".hp").text(total_status['hp']);
						total_elm.children(".atk").text(total_status['atk']);
						total_elm.children(".def").text(total_status['def']);
						total_elm.children(".matk").text(total_status['matk']);
						total_elm.children(".mdef").text(total_status['mdef']);
						
					},
					error: function() {
						alert("読み込みに失敗しました。\n頻発する場合、お手数ですが@syossan27までご連絡下さい。");
					}
				});
			}
		}).change();	

		$('#save').click(function(){

			var chara1 = {
				name : $("#s2id_chara1 #select2-chosen-1").text(),
				slot1 : $("#first-status .first-slot option:selected").val(),
				slot2 : $("#first-status .second-slot option:selected").val(),
				slot3 : $("#first-status .third-slot option:selected").val(),
				slot4 : $("#first-status .fourth-slot option:selected").val()
			};

			var chara2 = {
				name : $("#s2id_chara2 #select2-chosen-2").text(),
				slot1 : $("#second-status .first-slot option:selected").val(),
				slot2 : $("#second-status .second-slot option:selected").val(),
				slot3 : $("#second-status .third-slot option:selected").val(),
				slot4 : $("#second-status .fourth-slot option:selected").val()
			};

			var chara3 = {
				name : $("#s2id_chara3 #select2-chosen-3").text(),
				slot1 : $("#third-status .first-slot option:selected").val(),
				slot2 : $("#third-status .second-slot option:selected").val(),
				slot3 : $("#third-status .third-slot option:selected").val(),
				slot4 : $("#third-status .fourth-slot option:selected").val()
			};

			var chara4 = {
				name : $("#s2id_chara4 #select2-chosen-4").text(),
				slot1 : $("#fourth-status .first-slot option:selected").val(),
				slot2 : $("#fourth-status .second-slot option:selected").val(),
				slot3 : $("#fourth-status .third-slot option:selected").val(),
				slot4 : $("#fourth-status .fourth-slot option:selected").val()
			};

			var chara5 = {
				name : $("#s2id_chara5 #select2-chosen-5").text(),
				slot1 : $("#fifth-status .first-slot option:selected").val(),
				slot2 : $("#fifth-status .second-slot option:selected").val(),
				slot3 : $("#fifth-status .third-slot option:selected").val(),
				slot4 : $("#fifth-status .fourth-slot option:selected").val()
			};

			var chara6 = {
				name : $("#s2id_chara6 #select2-chosen-6").text(),
				slot1 : $("#sixth-status .first-slot option:selected").val(),
				slot2 : $("#sixth-status .second-slot option:selected").val(),
				slot3 : $("#sixth-status .third-slot option:selected").val(),
				slot4 : $("#sixth-status .fourth-slot option:selected").val()
			};

			$.cookie("chara1", chara1, { expires: 365 });
			$.cookie("chara2", chara2, { expires: 365 });
			$.cookie("chara3", chara3, { expires: 365 });
			$.cookie("chara4", chara4, { expires: 365 });
			$.cookie("chara5", chara5, { expires: 365 });
			$.cookie("chara6", chara6, { expires: 365 });
		});

		$('#load').click(function(){

			if ( $.cookie("chara1")['name'] != "-" ) {
				$("#chara1").select2("val", $.cookie("chara1")['name'], true);
				$(document).ajaxComplete(function(){
					$("#first-status .first-slot").val($.cookie("chara1")['slot1']);
					$("#first-status .second-slot").val($.cookie("chara1")['slot2']);
					$("#first-status .third-slot").val($.cookie("chara1")['slot3']);
					$("#first-status .fourth-slot").val($.cookie("chara1")['slot4']);
				})
			}
			if ( $.cookie("chara2")['name'] != "-" ) {
				$("#chara2").select2("val", $.cookie("chara2")['name'], true);
				$(document).ajaxComplete(function(){
					$("#second-status .first-slot").val($.cookie("chara2")['slot1']);
					$("#second-status .second-slot").val($.cookie("chara2")['slot2']);
					$("#second-status .third-slot").val($.cookie("chara2")['slot3']);
					$("#second-status .fourth-slot").val($.cookie("chara2")['slot4']);
				});
			}
			if ( $.cookie("chara3")['name'] != "-" ) {
				$("#chara3").select2("val", $.cookie("chara3")['name'], true);
				$(document).ajaxComplete(function(){
					$("#third-status .first-slot").val($.cookie("chara3")['slot1']);
					$("#third-status .second-slot").val($.cookie("chara3")['slot2']);
					$("#third-status .third-slot").val($.cookie("chara3")['slot3']);
					$("#third-status .fourth-slot").val($.cookie("chara3")['slot4']);
				});
			}
			if ( $.cookie("chara4")['name'] != "-" ) {
				$("#chara4").select2("val", $.cookie("chara4")['name'], true);
				$(document).ajaxComplete(function(){
					$("#fourth-status .first-slot").val($.cookie("chara4")['slot1']);
					$("#fourth-status .second-slot").val($.cookie("chara4")['slot2']);
					$("#fourth-status .third-slot").val($.cookie("chara4")['slot3']);
					$("#fourth-status .fourth-slot").val($.cookie("chara4")['slot4']);
				});
			}
			if ( $.cookie("chara5")['name'] != "-" ) {
				$("#chara5").select2("val", $.cookie("chara5")['name'], true);
				$(document).ajaxComplete(function(){
					$("#fifth-status .first-slot").val($.cookie("chara5")['slot1']);
					$("#fifth-status .second-slot").val($.cookie("chara5")['slot2']);
					$("#fifth-status .third-slot").val($.cookie("chara5")['slot3']);
					$("#fifth-status .fourth-slot").val($.cookie("chara5")['slot4']);
				});
			}
			if ( $.cookie("chara6")['name'] != "-" ) {
				$("#chara6").select2("val", $.cookie("chara6")['name'], true);
				$(document).ajaxComplete(function(){
					$("#sixth-status .first-slot").val($.cookie("chara6")['slot1']);
					$("#sixth-status .second-slot").val($.cookie("chara6")['slot2']);
					$("#sixth-status .third-slot").val($.cookie("chara6")['slot3']);
					$("#sixth-status .fourth-slot").val($.cookie("chara6")['slot4']);
				});
			}
		});
});
