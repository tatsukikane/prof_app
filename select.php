<?php
//map画面
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  //$pdo = new PDO('mysql:dbname=さくらDB名;charset=utf8;host=さくらMySQL','ユーザ名','接続先パスワード');
  $pdo = new PDO('mysql:dbname=sov_map;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM sov_map_table;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL Error:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .= "<p>";
    // $view .= $res["id"].", ".$res["name"].", ".$res["birthplace"]; // $res["id"]や$res["name"]
    // $view .= "</p>";

    //map表示用list作成
    $datalist[] = array(
      'id'=>$res["id"],
      'name'=>$res["name"],
      'birthplace'=>$res["birthplace"],
      'sov'=>$res["sov"],
      'sov2'=>$res["sov2"],
      'career'=>$res["career"],
      'sov_detail'=>$res["main_text"],
      'insta'=>$res["insta"],
      'twitter'=>$res["twitter"],
      'facebook'=>$res["Facebook"],
    );
    $json = json_encode($datalist);
    // var_dump($json);
  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>フリーアンケート表示</title>
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="./reset.css"> -->
  <!-- <style>div{padding: 10px;font-size:16px;}</style> -->
  <!-- <link rel="stylesheet" href="./select.css"> -->
  <!-- vis.js -->
  <link rel="stylesheet" href="./select.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <h1>Map</h1>
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      <div class="navbar-header"><a class="navbar-brand" href="edit.php">編集画面</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="user_select.php">USER管理画面</a></div>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- 個別プロフィール欄 -->
<!-- prof_areaは非表示にしておいて、クリックされたら表示するようにしておく -->
<div class="prof_area" id="prof_area">
  <div class="prof_area_title" id="prof_area_title">
    <h1><span class="topt">プロフィール</span></h1>
  </div>
  <div class="prof_area_main" id="prof_area_main">
    <div class="content_are">
      <h2><span>Name:</span></h2>
      <h2 id = "name">a</h2>
    </div>
    <div class="content_are">
      <h2><span>出身地:</span></h2>
      <h2 id = "birthplace"></h2>
    </div>
    <div class="content_are">
      <h2><span>Instagram:</span></h2>
      <h2 id = "insta">a</h2>
    </div>
    <div class="content_are">
      <h2><span>Twitter:</span></h2>
      <h2><p id = "twitter">a</p></h2>
    </div>
    <div class="content_are">
      <h2><span>facebook:</span></h2>
      <h2 id = "facebook">a</h2>
    </div>
    <div class="career_are">
      <h2><span>経歴:</span></h2>
      <h2 id = "career">a</h2>
    </div>
    <div class="sov_detail">
      <h2><span>人生観・価値観:</span></h2>
      <h2 id = "sov_detail">a</h2>
    </div>
  </div>
</div>

<div class="list_area"></div>

<!-- Map表示 -->
<div id="network"></div>


<script>
  //DBから取得したユーザーデータリスト
  const userdata = <?php echo $json;?>;
  console.log(userdata);
  function $(key){
      return document.getElementById(key)
  }
  // $("name").textContent = "変更";

  //vis.js
  let nodes = new vis.DataSet([
        {id: 1, label: '自由', group: 1, shape: "circle", font: {size: 80}, margin: 100, scaling: { label: { enabled: true} },}, //大きいやつ
        {id: 2, label: '安定', group: 2, shape: "circle", font: {size: 80}, margin: 100, scaling: { label: { enabled: true} }}, //大きいやつ
        {id: 3, label: '自然', group: 3, shape: "circle", font: {size: 80}, margin: 100, scaling: { label: { enabled: true} }}, //大きいやつ
        {id: 4, label: '仕事', group: 4, shape: "circle", font: {size: 80}, margin: 100, caling: { label: { enabled: true} }}, //大きいやつ
        {id: 5, label: 'プライベート', group: 5, shape: "circle", font: {size: 40}, margin: 50,  scaling: { label: { enabled: true} }}, //大きいやつ
        {id: 6, label: '家族', group: 6, shape: "circle", font: {size: 80}, margin: 100, scaling: { label: { enabled: true} }}, //大きいやつ
      ]);

      console.log(nodes);
      let edges = new vis.DataSet([
        { from: 1, to: 2, color: "rgb(20,24,200)" },
        { from: 2, to: 3,  color: { color: "rgba(30,30,30,0.2)", highlight: "blue" }},
        { from: 3, to: 4, color: { color: "red" } },
        { from: 4, to: 5, color: "rgb(20,24,200)" },
        { from: 5, to: 6, color: "rgb(20,24,200)" },
        { from: 6, to: 1, color: "rgb(20,24,200)" },

      ]);

      var container = document.getElementById('network');
      var data = {
        nodes: nodes,
        edges: edges
      };
      var options = {
        nodes: {
      shape: "ellipse",
      scaling: {
        min: 10,
        max: 30,
      },
      font: {
        size: 50,
        face: "Tahoma",
      },
    },
    edges: {
      width: 6.15,
      color: { inherit: "from" },
      smooth: {
        type: "continuous",
      },
    },
    physics: {
      stabilization: false,
      barnesHut: {
        gravitationalConstant: -80000,
        springConstant: 0.001,
        springLength: 500,
      },
    },
    interaction: {
      tooltipDelay: 200,
      hideEdgesOnDrag: true,
    },


        
        // nodes: {
        //   shape: "dot",
        //   size: 16,
        // },
        // physics: {
        //   forceAtlas2Based: {
        //     gravitationalConstant: -26,
        //     centralGravity: 0.005,
        //     springLength: 230,
        //     springConstant: 0.18,
        //   },
        //   maxVelocity: 146,
        //   solver: "forceAtlas2Based",
        //   timestep: 0.35,
        //   stabilization: { iterations: 150 },
        // },
      };
      var network = new vis.Network(container, data, options);
      network.on("click", function(params) {
        if (params.nodes.length == 1) {
          var nodeId = params.nodes[0];
          var node = nodes.get(nodeId);
          //ここにクリック時の処理を記述
          console.log(node.label + 'がクリックされました');
          //クリックされた人物のオブジェクト取得
          $("prof_area").style.display = 'block';
          const targetUser = userdata.find((v) => v.name === node.label);
          console.log(targetUser);
          $("name").textContent = targetUser.name;
          $("birthplace").textContent = targetUser.birthplace;
          $("insta").textContent = targetUser.insta;
          $("twitter").textContent = targetUser.twitter;
          $("facebook").textContent = targetUser.facebook;
          $("career").textContent = targetUser.career;
          $("sov_detail").textContent = targetUser.sov_detail;
        }
      });

      //edges追加用配列
      const updateEdgesArray = [
      ];

      //PHPから受け取ったデータをMap描画用の配列に突っ込んでいく
      function addData(){
        for(let i = 0; i < userdata.length; i++){
          let dataid = i+7; //map内識別ようid
          // console.log(userdata[i].name);
          nodes.add({id:dataid ,label: userdata[i].name, group: userdata[i].sov});
          // console.log(userdata[i].sov);
          // console.log(dataid);

          updateEdgesArray.push ({from: dataid, to: userdata[i].sov, arrows: 'to'}, {from: dataid, to: userdata[i].sov2, arrows: 'to'});
          // if (userdata[i].sov2 != null){
          //   updateEdgesArray.push ({from: dataid, to: userdata[i].sov2, arrows: 'to'});
          // }

          // console.log(updateEdgesArray);
          // console.log(nodes);
        }
        edges.update(updateEdgesArray);
      };
      addData()

      //背景画像
      var sourceCanvas = document.querySelector('canvas');
      sourceCanvas.style.backgroundImage = "url('https://sorae.info/wp-content/uploads/2019/03/heic1901a.jpg')";
</script>
</body>
</html>