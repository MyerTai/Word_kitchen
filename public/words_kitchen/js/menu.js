var selMode;
var allow;

$(function() {
    $("#book").change(function() {
        checkACT(this);
    });

    $("#mode").change(function() {
        selectExam();
    });

    $(".opt0").find("input").bind('input propertychange', function() {
        if (selMode != '2') {
            if ($(this).val() === '' && $(this).parent().siblings('div').find('input').val() === '') {
                $("div.opt1").find('input').prop('disabled', false);
                $("#scope").val("");
            } else {
                $("div.opt1").find('input').prop('disabled', true);
                $("#scope").val("1");
            }
        }
    });

    $(".opt1").find("input").bind('input propertychange', function() {
        if (selMode != '2') {
            if ($(this).val() === '') {
                $("div.opt0").find('input').prop('disabled', false);
                $("#scope").val("");
            } else {
                $("div.opt0").find('input').prop('disabled', true);
                $("#scope").val("0");
            }
        }
    });

    $('button[type="submit"]').click(function() {

        valid();

        $('input').change(function() {
            valid();
        });

        if (allow == 1) {
            $("#mode").attr("disabled", false);
            setTimeout(function() {
                if ($("#book").val() === 'act') {
                    $("#mode").attr("disabled", true);
                }
            }, 1000);
            return true;
        } else {
            return false;
        }
    });
});

function selectExam() {
    var mode = $("#mode").find("option:selected").val();
    selMode = mode;
    switch (mode) {
        case '0':
            $("div.opt-diver").show();
            $("div.opt0").find('input').prop('disabled', false);
            $("div.opt1").find('input').prop('disabled', false);
            break;

        case '1':
            $("div.opt-diver").show();
            $("div.opt0").find('input').prop('disabled', true);
            $("div.opt1").find('input').prop('disabled', true);
            break;

        case '2':
            $("div.opt-diver").hide();
            $("div.opt0").find('input').prop('disabled', false);
            $("div.opt1").find('input').prop('disabled', false);
            break;

        default:
            $("div.opt0").find('input').prop('disabled', true);
            $("div.opt1").find('input').prop('disabled', true);
            break;
    }
    $('div[class*="opt"]').find('input').val("");
}

function valid() {
    allow = 1
    var radio = 0;
    $("input").each(function() {
        if (!$(this).prop("disabled") && $(this).attr("type") == 'text') {
            if ($(this).val() == "") {
                allow = 0;
                $(this).parents("div.has-feedback").addClass("has-warning").removeClass("has-success");
                $(this).parents("div.has-feedback").append('<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
                $(this).siblings("span.glyphicon-ok").remove();
            } else {
                $(this).parents("div.has-feedback").addClass("has-success").removeClass("has-warning");
                $(this).parents("div.has-feedback").append('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
                $(this).siblings("span.glyphicon-warning-sign").remove();
            }
        } else if ($(this).prop("disabled") && $(this).attr("type") == 'text') {
            $(this).parents("div.has-feedback").removeClass("has-warning has-success");
            $(this).siblings("span.glyphicon-ok, span.glyphicon-warning-sign").remove();
        } else if ($(this).attr("type") == 'radio') {
            if ($(this).prop("checked")) {
                ++radio;
            }
        }
    });
    if (radio == 0) {
        allow = 0;
        $("label.radio-inline").parents("div.has-feedback").addClass("has-warning").removeClass("has-success");
    } else {
        $("label.radio-inline").parents("div.has-feedback").addClass("has-success").removeClass("has-warning");
    }
}

/*================*/

function checkACT(ele) {
    var book_element = $(ele);
    var startTitle = '开始序号';
    var startDetail = '开始抽查的序号';
    var endTitle = '结束序号';
    var endDetail = '抽查到该序号为止';

    if (book_element.val() === 'act') {
        console.log("act");
        // 限定抽查模式
        $("#mode").find('option').prop("selected", false);
        $("#mode").find('option[value="0"]').prop("selected", true);
        $("#mode").prop("disabled", true);
        selectExam();

        // 修改提醒文字
        $('label[for="startNum"]').html("开始List");
        $('#startNum').attr("placeholder", "输入开始抽查的List编号");
        $('label[for="endNum"]').html("结束List");
        $('#endNum').attr("placeholder", "抽查到此List编号为止");

        // 屏蔽混合模式
        $("#more").prop("disabled", true);
    } else {
        console.log("else");
        $("#mode").find('option').prop("selected", false);
        $("#mode").prop("disabled", false);
        selectExam();

        $('label[for="startNum"]').html(startTitle);
        $('#startNum').attr("placeholder", startDetail);
        $('label[for="endNum"]').html(endTitle);
        $('#endNum').attr("placeholder", endDetail);

        // 屏蔽混合模式
        $("#more").prop("disabled", false);
    }
}