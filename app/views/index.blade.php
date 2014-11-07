<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="all">
		<meta name="coverage" content="Japan">
		<meta name="date" content="2014-99-99">
		<meta name="author" content="syossan27">
		<meta name="classification" content="ゲーム">
		<meta name="copyright" content="© 2014 syossan27">
		<meta name="keywords" content="テラバトル,チーム,シミュレータ,ゲーム,アプリ,iPhone">
		<meta name="description" content="テラバトルでのチーム編成をシミュレートするサービスです。">
		<title>テラバトル チームシミュレータ</title>
		<link rel="shortcut icon" href="favicon.ico">
		{{ HTML::style('css/bootstrap-theme.min.css') }}
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/select2.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::script('js/jquery-2.1.1.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/select2.min.js') }}
		{{ HTML::script('js/select2_locale_ja.js') }}
		{{ HTML::script('js/jquery.cookie.js') }}
		{{ HTML::script('js/main.js') }}
		{{ HTML::script('js/sns.js') }}
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
	</head>
	<body>
		<div id="fb-root"></div>
		<header>
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="/">テラバトル チームシミュレータ</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="https://twitter.com/syossan27">Author：@syossan27</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div id="container">
			<div id="contents" class="row">
				<ins class="adsbygoogle"
						 style="display:inline-block;width:728px;height:90px"
						 data-ad-client="ca-pub-0605203626039734"
						 data-ad-slot="7455969549"></ins>
				<div id="notice" class="col-sm-8">
					<p>【実装予定】</p>
					<p>・他ユーザへのチーム公開機能</p>
					<p>・その他要望があれば追加</p>
				</div>
				<div id="sns" class="col-sm-4">
					<a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja">ツイート</a>
					<div class="fb-like" data-href="http://terra-team.co" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					<a href="http://b.hatena.ne.jp/entry/terra-team.co" class="hatena-bookmark-button" data-hatena-bookmark-title="テラバトル チームシミュレータ" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
				</div>
				<div id="character" class="col-sm-3">
					<span class="category-title">
						キャラクター１
					</span>
					<select id="chara1" class="select">
						<option value="none">-</option>
						@foreach ($character_data as $data)
						<option value="{{$data['job']}}">{{ $data['job'] }}</option>
						@endforeach
					</select>

					<span class="category-title">
						キャラクター２
					</span>
					<select id="chara2" class="select">
						<option value="none">-</option>
						@foreach ($character_data as $data)
						<option value="{{$data['job']}}">{{ $data['job'] }}</option>
						@endforeach
					</select>

					<span class="category-title">
						キャラクター３
					</span>
					<select id="chara3" class="select">
						<option value="none">-</option>
						@foreach ($character_data as $data)
						<option value="{{$data['job']}}">{{ $data['job'] }}</option>
						@endforeach
					</select>

					<span class="category-title">
						キャラクター４
					</span>
					<select id="chara4" class="select">
						<option value="none">-</option>
						@foreach ($character_data as $data)
						<option value="{{$data['job']}}">{{ $data['job'] }}</option>
						@endforeach
					</select>

					<span class="category-title">
						キャラクター５
					</span>
					<select id="chara5" class="select">
						<option value="none">-</option>
						@foreach ($character_data as $data)
						<option value="{{$data['job']}}">{{ $data['job'] }}</option>
						@endforeach
					</select>

					<span class="category-title">
						キャラクター６
					</span>
					<select id="chara6" class="select">
						<option value="none">-</option>
						@foreach ($character_data as $data)
						<option value="{{$data['job']}}">{{ $data['job'] }}</option>
						@endforeach
					</select>
				</div>
				<div id="data" class="col-sm-9">
					<button id="save">保存</button>
					<button id="load">読込</button>
					<div id="total-status"  class="col-sm-12">
						<span class="status-box-title col-sm-12">
							総合ステータス
						</span>
						<div class="left-status-box col-sm-6">
							<table>
								<tr>
									<td>HP：</td>
									<td class="hp"></td>
									<td>ATK：</td>
									<td class="atk"></td>
									<td>DEF：</td>
									<td class="def"></td>
									<td>MATK：</td>
									<td class="matk"></td>
									<td>MDEF：</td>
									<td class="mdef"></td>
								</tr>
							</table>
						</div>
						<div class="center-right-status-box col-sm-3">
						</div>
						<div class="right-status-box col-sm-3">
						</div>
					</div>
					<div id="first-status"  class="col-sm-12">
						<span class="status-box-title col-sm-12">
							<img>
							キャラクター１ ステータス
						</span>
						<div class="left-status-box col-sm-2">
							<table>
								<tr>
									<td>HP</td>
									<td class="hp"></td>
								</tr>
								<tr>
									<td>ATK</td>
									<td class="atk"></td>
								</tr>
								<tr>
									<td>DEF</td>
									<td class="def"></td>
								</tr>
								<tr>
									<td>MATK</td>
									<td class="matk"></td>
								</tr>
								<tr>
									<td>MDEF</td>
									<td class="mdef"></td>
								</tr>
							</table>
						</div>
						<div class="center-status-box col-sm-5">
							<table>	
								<tr>
									<td>スキル１</td>
									<td class="first-skill"></td>
								</tr>
								<tr>
									<td>スキル２</td>
									<td class="second-skill"></td>
								</tr>
								<tr>
									<td>スキル３</td>
									<td class="third-skill"></td>
								</tr>
								<tr>
									<td>スキル４</td>
									<td class="fourth-skill"></td>
								</tr>
							</table>
						</div>
						<div class="right-status-box col-sm-5">
							<table>	
								<tr>
									<td>スロット１</td>
									<td>
										<select class="first-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット２</td>
									<td>
										<select class="second-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット３</td>
									<td>
										<select class="third-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット４</td>
									<td>
										<select class="fourth-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div id="second-status"  class="col-sm-12">
						<span class="status-box-title col-sm-12">
							<img>
							キャラクター２ ステータス
						</span>
						<div class="left-status-box col-sm-2">
							<table>
								<tr>
									<td>HP</td>
									<td class="hp"></td>
								</tr>
								<tr>
									<td>ATK</td>
									<td class="atk"></td>
								</tr>
								<tr>
									<td>DEF</td>
									<td class="def"></td>
								</tr>
								<tr>
									<td>MATK</td>
									<td class="matk"></td>
								</tr>
								<tr>
									<td>MDEF</td>
									<td class="mdef"></td>
								</tr>
							</table>
						</div>
						<div class="center-status-box col-sm-5">
							<table>	
								<tr>
									<td>スキル１</td>
									<td class="first-skill"></td>
								</tr>
								<tr>
									<td>スキル２</td>
									<td class="second-skill"></td>
								</tr>
								<tr>
									<td>スキル３</td>
									<td class="third-skill"></td>
								</tr>
								<tr>
									<td>スキル４</td>
									<td class="fourth-skill"></td>
								</tr>
							</table>
						</div>
						<div class="right-status-box col-sm-5">
							<table>	
								<tr>
									<td>スロット１</td>
									<td>
										<select class="first-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット２</td>
									<td>
										<select class="second-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット３</td>
									<td>
										<select class="third-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット４</td>
									<td>
										<select class="fourth-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div id="third-status"  class="col-sm-12">
						<span class="status-box-title col-sm-12">
							<img>
							キャラクター３ ステータス
						</span>
						<div class="left-status-box col-sm-2">
							<table>
								<tr>
									<td>HP</td>
									<td class="hp"></td>
								</tr>
								<tr>
									<td>ATK</td>
									<td class="atk"></td>
								</tr>
								<tr>
									<td>DEF</td>
									<td class="def"></td>
								</tr>
								<tr>
									<td>MATK</td>
									<td class="matk"></td>
								</tr>
								<tr>
									<td>MDEF</td>
									<td class="mdef"></td>
								</tr>
							</table>
						</div>
						<div class="center-status-box col-sm-5">
							<table>	
								<tr>
									<td>スキル１</td>
									<td class="first-skill"></td>
								</tr>
								<tr>
									<td>スキル２</td>
									<td class="second-skill"></td>
								</tr>
								<tr>
									<td>スキル３</td>
									<td class="third-skill"></td>
								</tr>
								<tr>
									<td>スキル４</td>
									<td class="fourth-skill"></td>
								</tr>
							</table>
						</div>
						<div class="right-status-box col-sm-5">
							<table>	
								<tr>
									<td>スロット１</td>
									<td>
										<select class="first-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット２</td>
									<td>
										<select class="second-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット３</td>
									<td>
										<select class="third-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット４</td>
									<td>
										<select class="fourth-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div id="fourth-status"  class="col-sm-12">
						<span class="status-box-title col-sm-12">
							<img>
							キャラクター４ ステータス
						</span>
						<div class="left-status-box col-sm-2">
							<table>
								<tr>
									<td>HP</td>
									<td class="hp"></td>
								</tr>
								<tr>
									<td>ATK</td>
									<td class="atk"></td>
								</tr>
								<tr>
									<td>DEF</td>
									<td class="def"></td>
								</tr>
								<tr>
									<td>MATK</td>
									<td class="matk"></td>
								</tr>
								<tr>
									<td>MDEF</td>
									<td class="mdef"></td>
								</tr>
							</table>
						</div>
						<div class="center-status-box col-sm-5">
							<table>	
								<tr>
									<td>スキル１</td>
									<td class="first-skill"></td>
								</tr>
								<tr>
									<td>スキル２</td>
									<td class="second-skill"></td>
								</tr>
								<tr>
									<td>スキル３</td>
									<td class="third-skill"></td>
								</tr>
								<tr>
									<td>スキル４</td>
									<td class="fourth-skill"></td>
								</tr>
							</table>
						</div>
						<div class="right-status-box col-sm-5">
							<table>	
								<tr>
									<td>スロット１</td>
									<td>
										<select class="first-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット２</td>
									<td>
										<select class="second-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット３</td>
									<td>
										<select class="third-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット４</td>
									<td>
										<select class="fourth-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div id="fifth-status"  class="col-sm-12">
						<span class="status-box-title col-sm-12">
							<img>
							キャラクター５ ステータス
						</span>
						<div class="left-status-box col-sm-2">
							<table>
								<tr>
									<td>HP</td>
									<td class="hp"></td>
								</tr>
								<tr>
									<td>ATK</td>
									<td class="atk"></td>
								</tr>
								<tr>
									<td>DEF</td>
									<td class="def"></td>
								</tr>
								<tr>
									<td>MATK</td>
									<td class="matk"></td>
								</tr>
								<tr>
									<td>MDEF</td>
									<td class="mdef"></td>
								</tr>
							</table>
						</div>
						<div class="center-status-box col-sm-5">
							<table>	
								<tr>
									<td>スキル１</td>
									<td class="first-skill"></td>
								</tr>
								<tr>
									<td>スキル２</td>
									<td class="second-skill"></td>
								</tr>
								<tr>
									<td>スキル３</td>
									<td class="third-skill"></td>
								</tr>
								<tr>
									<td>スキル４</td>
									<td class="fourth-skill"></td>
								</tr>
							</table>
						</div>
						<div class="right-status-box col-sm-5">
							<table>	
								<tr>
									<td>スロット１</td>
									<td>
										<select class="first-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット２</td>
									<td>
										<select class="second-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット３</td>
									<td>
										<select class="third-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット４</td>
									<td>
										<select class="fourth-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div id="sixth-status"  class="col-sm-12">
						<span class="status-box-title col-sm-12">
							<img>
							キャラクター６ ステータス
						</span>
						<div class="left-status-box col-sm-2">
							<table>
								<tr>
									<td>HP</td>
									<td class="hp"></td>
								</tr>
								<tr>
									<td>ATK</td>
									<td class="atk"></td>
								</tr>
								<tr>
									<td>DEF</td>
									<td class="def"></td>
								</tr>
								<tr>
									<td>MATK</td>
									<td class="matk"></td>
								</tr>
								<tr>
									<td>MDEF</td>
									<td class="mdef"></td>
								</tr>
							</table>
						</div>
						<div class="center-status-box col-sm-5">
							<table>	
								<tr>
									<td>スキル１</td>
									<td class="first-skill"></td>
								</tr>
								<tr>
									<td>スキル２</td>
									<td class="second-skill"></td>
								</tr>
								<tr>
									<td>スキル３</td>
									<td class="third-skill"></td>
								</tr>
								<tr>
									<td>スキル４</td>
									<td class="fourth-skill"></td>
								</tr>
							</table>
						</div>
						<div class="right-status-box col-sm-5">
							<table>	
								<tr>
									<td>スロット１</td>
									<td>
										<select class="first-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット２</td>
									<td>
										<select class="second-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット３</td>
									<td>
										<select class="third-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>スロット４</td>
									<td>
										<select class="fourth-slot">
											<option value="none">-</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div></div>
				</div>
			</div>
			<div id="footer">
				<p>© 2014 @syossan27. ALL RIGHTS RESERVED</p>
			</div>
		</div>
	</body>
</html>
