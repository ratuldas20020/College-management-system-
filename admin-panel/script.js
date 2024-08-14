let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
  } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
};

$(".overview-boxes .box").click(function () {
  if (!$(this).hasClass("box-active")) {
    $(".box").removeClass("box-active");
    $(this).addClass("box-active");
  }
  if (this.id == "total-student-card") {
    $(".option-boxes").removeClass("show");
    $("#total-student-container").addClass("show");
  } else if (this.id == "pending-studnets-card") {
    $(".option-boxes").removeClass("show");
    $("#pending-studnets-container").addClass("show");
  } else if (this.id == "total-notice-card") {
    $(".option-boxes").removeClass("show");
    $("#total-notice-container").addClass("show");
  } else if (this.id == "total-post-card") {
    $(".option-boxes").removeClass("show");
    $("#total-post-container").addClass("show");
  }
});

if ($(this).hasClass("active")) {
  $(this).removeClass("active");
} else {
  $(this).addClass("active");
}

$(document).ready(function () {
  getStudents();
  getPendingStudent();
  getAllNotices();
  getAllPosts();
});

// get all students
function getStudents() {
  document.getElementById("students-table-body").innerHTML = "";
  updateTotalStudent();
  $.ajax({
    url: "./get_students.php",
    method: "GET",
    success: function (data) {
      let notice = JSON.parse(data);
      notice.map((item) => {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");

        let editBtn = document.createElement("button");
        editBtn.classList.add("btn");
        editBtn.classList.add("btn-primary");
        editBtn.classList.add("m-1");
        editBtn.innerText = "Edit";
        // editBtn.onclick = editStudent(item["regno"]);

        let deleteBtn = document.createElement("button");
        deleteBtn.classList.add("btn");
        deleteBtn.classList.add("btn-danger");
        deleteBtn.classList.add("m-1");
        deleteBtn.classList.add("regno");
        deleteBtn.innerText = "Delete";
        deleteBtn.onclick = () => {
          console.log("Delete", item["regno"]);
          $.ajax({
            url: "./rejectStudent.php",
            method: "POST",
            data: {
              regno: item["regno"],
            },
            success: function (data) {
              getStudents();
            },
          });
        };

        td5.append(editBtn, deleteBtn);

        td1.innerHTML = item["fullname"];
        td2.innerHTML = item["regno"];
        td3.innerHTML = item["college"];
        td4.innerHTML = item["branch"];

        tr.append(td1, td2, td3, td4, td5);
        document.getElementById("students-table-body").append(tr);
      });
      $("#total-students").DataTable();
    },
  });
}
// get all pending students

function getPendingStudent() {
  document.getElementById("pending-table-body").innerHTML = "";
  updateTotalStudent();
  $.ajax({
    url: "./get_pending.php",
    method: "GET",
    success: function (data) {
      let notice = JSON.parse(data);
      notice.map((item) => {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");

        let approveBtn = document.createElement("button");
        approveBtn.classList.add("btn");
        approveBtn.classList.add("btn-primary");
        approveBtn.classList.add("m-1");
        // approveBtn.classList.add("Hello");
        approveBtn.onclick = () => {
          console.log("ApproveStudent", item["regno"]);
          $.ajax({
            url: "./approveStudent.php",
            method: "POST",
            data: {
              regno: item["regno"],
            },
            success: function (data) {
              getPendingStudent();
            },
          });
        };
        approveBtn.innerText = "Approve";

        let rejectBtn = document.createElement("button");
        rejectBtn.classList.add("btn");
        rejectBtn.classList.add("btn-danger");
        rejectBtn.classList.add("m-1");

        rejectBtn.innerText = "Reject";
        rejectBtn.onclick = () => {
          console.log("RejectStudent", item["regno"]);
          $.ajax({
            url: "./rejectStudent.php",
            method: "POST",
            data: {
              regno: item["regno"],
            },
            success: function (data) {
              getPendingStudent();
            },
          });
        };

        td5.append(approveBtn, rejectBtn);

        td1.innerHTML = item["fullname"];
        td2.innerHTML = item["regno"];
        td3.innerHTML = item["college"];
        td4.innerHTML = item["branch"];

        tr.append(td1, td2, td3, td4, td5);
        document.getElementById("pending-table-body").append(tr);
      });
      $("#pending-students").DataTable();
    },
  });
}

// get all Notices students
function getAllNotices() {
  document.getElementById("table-body").innerHTML = "";
  updateTotalStudent();
  $.ajax({
    url: "./get_notices.php",
    method: "GET",
    success: function (data) {
      let notice = JSON.parse(data);

      notice.map((item) => {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        td1.innerHTML = item["sl_no"];
        td2.innerHTML = item["message"];
        td3.innerHTML = item["time"];
        tr.append(td1, td2, td3);
        document.getElementById("table-body").append(tr);
      });
      $("#total-notices").DataTable();
    },
  });
}

function getAllPosts() {
  document.getElementById("post-table-body").innerHTML = "";
  updateTotalStudent();
  $.ajax({
    url: "./get_posts.php",
    method: "GET",
    success: function (data) {
      let post = JSON.parse(data);

      post.map((item) => {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        td1.innerHTML = item["id_no"];
        td2.innerHTML = item["message"];
        td3.innerHTML = item["time"];
        tr.append(td1, td2, td3);
        document.getElementById("post-table-body").append(tr);
      });
      $("#total-posts").DataTable();
    },
  });
}

function addNotice() {
  let noticemessage = $("#message-text").val();
  $.ajax({
    url: "./add-notice.php",
    type: "POST",
    data: {
      message: noticemessage,
    },
    success: function (data, status) {
      getAllNotices();
    },
  });
}

function addPost() {
  let postmessage = $("#post-text").val();
  $.ajax({
    url: "./add-post.php",
    type: "POST",
    data: {
      message: postmessage,
    },
    success: function (data, status) {
      getAllPosts();
    },
  });
}

function updateTotalStudent() {
  $.ajax({
    url: "./view_all.php",
    type: "GET",
    success: function (data, status) {
      data = JSON.parse(data);
      document.getElementById("total-no-students").innerHTML = data["students"];
      document.getElementById("total-no-pending").innerHTML = data["pending"];
      document.getElementById("total-no-notice").innerHTML = data["notices"];
      document.getElementById("total-no-post").innerHTML = data["posts"];
    },
  });
}
