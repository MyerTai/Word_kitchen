<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title>选择题库</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="words_kitchen/css/menu.css" rel="stylesheet" />

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1>单词厨房<p><small><span class="label label-success">REVO</span></small></p></h1>
                <p>＝＝词库包含＝＝</p>
                <p><strong class="text-primary">新概念</strong>｜基础词汇</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 well ">
                <legend>选择内容</legend>
                <form accept-charset="UTF-8" action="dish" method="POST" target="_blank">
                    {!! csrf_field() !!}
                    <div class="form-group has-feedback">
                        <label class="control-label" for="name">学生名字</label>
                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="学生英文名" />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="book">选择单词书</label>
                        <select name="book" id="book" class="form-control">
                        <option selected disabled>请选择</option>
                        <option value="monkey1">丹丹人文基础词汇</option>
                        <option value="prepare1">托福准备一级</option>
                        <option value="prepare2">托福准备二级</option>
                        <option value="toefl">托福词汇</option>
                        <option value="barrons">巴郎3500</option>
                        <option value="directhits">Direct Hits 400</option>
                        <option value="act">ACT必备(无解释)</option>
                        <option value="ielts6.5">雅思6.5分</option>
                        <option value="gre_core">GRE核心词汇</option>
                        <option value="gre_latest">GRE最新词汇</option>
                        <option value="gre_reverse">GRE逆序词汇</option>
                    </select>
                    </div>

                    <div class="form-group" disabled>
                        <label class="control-label" for="mode">抽查方式</label>
                        <select name="mode" id="mode" class="form-control">
                        <option disabled selected>请选择抽查方式</option>
                        <option value="0">定量考查(指定范围或全本定量)</option>
                        <option value="1">全部考察(全本全查)</option>
                        <option disabled>－－－－</option>
                        <option value="2">定量抽查(先指定范围，再定量抽查)</option>
                    </select>
                    </div>

                    <div class="opt1">
                        <div class="form-group has-feedback">
                            <label class="control-label" for="quantity">抽查数量</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" value="" placeholder="需要抽查的数量" disabled/>
                        </div>
                    </div>

                    <input type="hidden" name="scope" id="scope" value="" />
                    <input type="hidden" name="check" id="check" value="index/index" />

                    <div class="form-group has-feedback">
                        <label class="control-label" for="order">排序方式</label>

                        <br />
                        <label class="radio-inline">
                        <input type="radio" name="order" id="asc" value="asc" /> 顺序
                    </label>
                        <label class="radio-inline">
                        <input type="radio" name="order" id="desc" value="desc" /> 逆序
                    </label>
                        <label class="radio-inline">
                        <input type="radio" name="order" id="random" value="random" /> 乱序
                    </label>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="control-label" for="more">更多选项</label>

                        <br />
                        <label class="checkbox-inline">
                        <input type="checkbox" name="more" id="more" value="remix" /> 中英混合
                    </label>
                    </div>

                    <div class="form-group has-feedback hidden">
                        <label class="control-label" for="quantity">抽查数量</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value="" placeholder="需要抽查的数量" disabled/>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-lg btn-success btn-shadow">Whip!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr />
    <br />

    <footer class="footer ">
        <div class="container">
            <!--<div class="row footer-top">
            <div class="col-sm-6 col-lg-6">
                <h4>
                    <img src="http://static.bootcss.com/www/assets/img/logo.png">
                </h4>
                <p>本网站所提供一切服务由<a href="http://www.bootcss.com/">丹丹人文英语</a>提供，并全部遵循 <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">CC BY 3.0</a>协议发布。</p>
            </div>
            <div class="col-sm-6  col-lg-5 col-lg-offset-1">
                <div class="row about">
                    <div class="col-xs-3">
                        <h4>关于</h4>
                        <ul class="list-unstyled">
                            <li><a href="/about/">关于我们</a></li>
                            <li><a href="/ad/">广告合作</a></li>
                            <li><a href="/links/">友情链接</a></li>
                            <li><a href="/hr/">招聘</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>联系方式</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://weibo.com/bootcss" title="Bootstrap中文网官方微博" target="_blank">新浪微博</a></li>
                            <li><a href="mailto:admin@bootcss.com">电子邮件</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>旗下网站</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://www.golaravel.com/" target="_blank">Laravel中文网</a></li>
                            <li><a href="http://www.ghostchina.com/" target="_blank">Ghost中国</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <h4>赞助商</h4>
                        <ul class="list-unstyled">
                            <li><a href="http://www.ucloud.cn/" target="_blank">UCloud</a></li>
                            <li><a href="https://www.upyun.com" target="_blank">又拍云</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <hr>-->
            <div class="row footer-bottom">
                <ul class="list-inline text-center">
                    <li>MyerTai</li>｜
                    <li>Copyright 2016－2017</li>
                </ul>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="words_kitchen/js/menu.js"></script>
</body>

</html>