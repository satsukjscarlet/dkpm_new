<?php // -*-mode: PHP; coding:utf-8;-*-
namespace MRBS;

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 *
 *   NOTE: if you include or require other files from this file, for example
 *   to store your database details in a separate location, then you should
 *   use an absolute and not a relative pathname.
 **************************************************************************/

/**********
 * Timezone
 **********/
 
// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "Asia/Ho_Chi_Minh";


/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL
$dbsys = "mysql";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$db_host = "localhost";
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
// $db_port = 1234;
// Database name:
$db_database = "mrbs";
// Schema name.  This only applies to PostgreSQL and is only necessary if you have more
// than one schema in your database and also you are using the same MRBS table names in
// multiple schemas.
//$db_schema = "public";
// Database login user name:
$db_login = "root";
// Database login password:
$db_password = '';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Set $db_persist to TRUE to use PHP persistent (pooled) database connections.  Note
// that persistent connections are not recommended unless your system suffers significant
// performance problems without them.   They can cause problems with transactions and
// locks (see http://php.net/manual/en/features.persistent-connections.php) and although
// MRBS tries to avoid those problems, it is generally better not to use persistent
// connections if you can.

$db_persist = FALSE;


$debug = true;

/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */
// The company logo, additional information and URL are all optional.
$mrbs_company_logo = "https://dichvuvpct.nhuatienphong.vn/image/logo2.png";
$mrbs_company = "Công Ty CP Nhựa Thiếu Niên Tiền Phong";   // This line must always be uncommented ($mrbs_company is used in various places)
$mrbs_company_url = "https://dichvuvpct.nhuatienphong.vn/";

// Uncomment this next line to use a logo instead of text for your organisation in the header
// $mrbs_company_logo = "images/logo.png";
$min_booking_date_enabled = true;
$min_booking_date = date("y-m-d");  // Must be a string in the format "yyyy-mm-dd"
$strftime_format['date']               = "%A  %B %Y";  // Used in Day view    
$default_view = "month";
$strftime_format['weekview_headers']   = "%a<br>%e. %B";  // Used in the table header in Week view (all rooms)
// Set the email address of the From field. Default is 'admin_email@your.org'
$mail_settings['from'] = 'datxe@nhuatienphong.net';

// Set the recipient email. Default is 'admin_email@your.org'. You can define
// more than one recipient like this "john@doe.com,scott@tiger.com"
$mail_settings['recipients'] = '';
$mail_settings['admin_on_bookings']      = true;  // the addresses defined by $mail_settings['recipients'] below
$mail_settings['area_admin_on_bookings'] = true;  // the area administrator
$mail_settings['room_admin_on_bookings'] = true;  // the room administrator
$mail_settings['booker']                 = true;  // the person making the booking
$mail_settings['book_admin_on_approval'] = true;  // the booking administrator when booking approval is enabled

$mail_settings['on_change'] = true;  // when an entry is changed
$mail_settings['on_delete'] = true;  // when an entry is deleted

// These settings determine what should be included in the email
// Set to true or false as required
$mail_settings['details']   = true; // Set to true if you want full booking details;
$mail_settings['html']      = true; // Set to true if you want HTML mail
$mail_settings['icalendar'] = true; // Set to true to include iCalendar details

// HOW TO EMAIL - BACKEND
// ----------------------
// Set the name of the backend used to transport your mails. Either 'mail',
// 'smtp', 'sendmail' or 'qmail'. Default is 'mail'.
$mail_settings['admin_backend'] = 'smtp';
$smtp_settings['host'] = 'smtp.yandex.ru';  // SMTP server
$smtp_settings['port'] = 465;           // SMTP port number
$smtp_settings['auth'] = true;        // Whether to use SMTP authentication
$smtp_settings['secure'] = 'ssl';
$smtp_settings['username'] = 'datxe@nhuatienphong.net';       // Username (if using authentication)
$smtp_settings['password'] = 'Ntp@1234'; 
$smtp_settings['hostname'] = 'smtp.yandex.ru';
$disable_automatic_language_changing = true;
// Set email address of the Carbon Copy field. Default is ''. You can define
// more than one recipient (see 'recipients')
$mail_settings['cc'] = 'datxe@nhuatienphong.net';

// $edit_entry_field_order = array('name', 'in_charge');
// $vocab_override['vi']['users.employee_code'] = "Mã nhân viên";
// $vocab_override['vi']['entry.startkm'] = "Số Km đầu";
// $vocab_override['vi']['entry.endkm'] = "Số Km cuối";
$vocab_override['vi']['entry.dispatch'] = "Quyết định công tác";
$vocab_override['vi']['entry.slot'] = "Số người";
$vocab_override['vi']['entry.note'] = "Ghi chú";
$auth['admin_only_types'] = array('E','A','B');
$edit_entry_field_order = array('create_by', 'name','dispatch', 'slot', 'start_time','end_time', 'room_id', 'description', 'type', 'Confirm_status', 'privacy_status',);
// Set this to true if you want to prevent bookings of a type that is invalid for a room
// Đặt giá trị này thành true nếu bạn muốn ngăn việc đặt loại phòng không hợp lệ
$prevent_simultaneous_bookings = false;
// Days of the week that are weekdays
// Các ngày trong tuần là các ngày trong tuần
$weekdays = array(1, 2, 3, 4, 5);
// You can add a placeholder to text input fields in the entry form by using
// $vocab_override['en']['entry.description.placeholder'] = "Tên người tham gia, yêu cầu về việc chở đồ...";
// Đặt giá trị này thành false nếu bạn không muốn có khả năng tạo các sự kiện
// người khác có thể đăng ký.
$enable_registration = false;

// If you don't want ordinary users to be able to see the other users'
// details then set this to true.  (Only relevant when using 'db' authentication]
// Nếu bạn không muốn người dùng bình thường có thể nhìn thấy những người dùng khác '
// chi tiết sau đó đặt giá trị này thành true. (Chỉ có liên quan khi sử dụng xác thực 'db']
$auth['only_admin_can_see_other_users'] = true;

$mail_settings['admin_on_bookings']      = true;  // the addresses defined by $mail_settings['recipients'] below
$mail_settings['area_admin_on_bookings'] = true;  // the area administrator
$mail_settings['room_admin_on_bookings'] = true;  // the room administrator
$mail_settings['booker']                 = true;  // the person making the booking
$mail_settings['book_admin_on_approval'] = true;  // the booking administrator when booking approval is enabled

//Thời điểm gửi mail
$mail_settings['on_change'] = true;  // when an entry is changed
$mail_settings['on_delete'] = true;  // when an entry is deleted

//Gửi gì trong mail
$mail_settings['details']   = true; // Set to true if you want full booking details;
$mail_settings['html']      = true; // Set to true if you want HTML mail
$mail_settings['icalendar'] = true; // Set to true to include iCalendar details

// Set the language used for emails (choose an available lang.* file).
// Đặt ngôn ngữ được sử dụng cho email (chọn một tệp lang. * Có sẵn).
$mail_settings['admin_lang'] = 'vi';   // Default is 'en'.

// Đặt giá trị này thành true để tắt tính năng tự động thay đổi ngôn ngữ mà MRBS thực hiện
// dựa trên cài đặt ngôn ngữ trình duyệt của người dùng. Nó sẽ đảm bảo rằng
// ngôn ngữ được hiển thị luôn là giá trị của $ default_language_tokens,
// như được chỉ định bên dưới
$disable_automatic_language_changing = true;

// Đặt điều này thành một định nghĩa ngôn ngữ khác để mặc định thành khác
// mã thông báo ngôn ngữ. Điều này phải tương đương với tệp lang. * Trong MRBS.
// ví dụ. sử dụng "fr" để sử dụng các bản dịch trong "lang.fr" làm mặc định
// bản dịch. [LƯU Ý: chỉ cần thay đổi điều này nếu bạn
// đã tắt tính năng tự động thay đổi ngôn ngữ ở trên]
$default_language_tokens = "vi";

// Đặt điều này thành ngôn ngữ hợp lệ được hỗ trợ trên hệ điều hành bạn chạy
// Bật máy chủ MRBS nếu bạn muốn ghi đè xác định ngôn ngữ tự động
// MRBS thực hiện. Ngôn ngữ phải ở dạng ngôn ngữ BCP 47
// thẻ, ví dụ: 'en-GB' hoặc 'sr-Latn-RS'. Lưu ý rằng MRBS sẽ chuyển đổi điều này thành
// định dạng phù hợp với hệ điều hành của bạn, ví dụ: bằng cách thêm '.utf-8' hoặc thay đổi nó thành 'eng'.
$override_locale = "vi-VN";

