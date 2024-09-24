<?php
namespace MRBS;

/**************************************************************************
 *   MRBS system defaults file
 *
 * DO _NOT_ MODIFY THIS FILE YOURSELF. IT IS FOR _INTERNAL_ USE ONLY.
 *
 * TO CONFIGURE MRBS FOR YOUR SYSTEM ADD CONFIGURATION PARAMETERS FROM
 * THIS FILE INTO config.inc.php, DO _NOT_ EDIT THIS FILE.
 *
 **************************************************************************/

/********
 * System
 ********/

// Set $debug = true to force MRBS to output debugging information to the browser.
// Caching of files is also disabled when $debug is set.
// WARNING!  Do not use this for production systems, as not only will it generate
// unnecessary output in the broswer, but it could also expose sensitive security
// information (eg database usernames and passwords).
// Trả về một chuỗi chứa một tập hợp chi tiết cho $ data bao gồm một nhãn / giá trị
// ghép nối cho từng phần tử dữ liệu trong mảng $ data. Nếu $ as_html là true thì chuỗi
// là HTML cho nội dung bảng, tức là trông giống như "<tbody> ... </tbody>".
// $ keep_private boolean nếu true thì bất kỳ trường private nào sẽ được cấp cho class 'private';
// lưu ý rằng $ data phải đã có các giá trị được thay thế
// cho các trường riêng tư
// boolean $ room_disabled nếu đúng thì một ghi chú sẽ được thêm vào rằng phòng đã bị tắt
$debug = false;


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
// Múi giờ mà các phòng họp của bạn hoạt động. Điều này đặc biệt quan trọng
// để thiết lập điều này nếu bạn đang sử dụng PHP 5 trên Linux. Trong cấu hình này
// nếu bạn không, các cuộc họp ở DST khác với bạn hiện tại
// in được bù đắp bởi offset DST không chính xác.
//
// Lưu ý rằng múi giờ có thể được đặt trên cơ sở từng khu vực, do đó, nói đúng ra điều này
// cài đặt phải ở areadefaults.inc.php, nhưng vì nó rất quan trọng nên đặt
// múi giờ phù hợp mà nó được đưa vào đây.
//
// Khi nâng cấp cài đặt hiện có, cài đặt này phải được đặt thành
// múi giờ mà máy chủ web chạy. Xem tài liệu CÀI ĐẶT để biết thêm thông tin.
//
// Có thể tìm thấy danh sách các múi giờ hợp lệ tại http://php.net/manual/timezones.php
// Dòng sau phải được bỏ ghi chú bằng cách xóa '//' ở đầu
$timezone = "Asia/Ho_Chi_Minh";

// If you are using iCalendar notifications of bookings (see the mail settings below)
// then the iCalendar attachment includes a definition of your timezone in
// VTIMEZONE format.   This defines the timezone, including the rules for Daylight
// Saving Time transitions.    This information is included in the MRBS distribution.
// However, as governments can change the rules periodically, MRBS will check from
// time to time to see if there is a later version available on the web.   If your
// site prevents external access to the web, this check will time out.  However
// you can avoid the timeout and stop MRBS checking for up to date versions by
// setting $zoneinfo_update = false;

// Nếu bạn đang sử dụng thông báo đặt chỗ của iCalendar (xem cài đặt thư bên dưới)
// thì tệp đính kèm iCalendar bao gồm định nghĩa về múi giờ của bạn trong
// Định dạng VTIMEZONE. Điều này xác định múi giờ, bao gồm các quy tắc cho Ánh sáng ban ngày
// Tiết kiệm thời gian chuyển tiếp. Thông tin này được bao gồm trong phân phối MRBS.
// Tuy nhiên, vì các chính phủ có thể thay đổi các quy tắc theo định kỳ, MRBS sẽ kiểm tra từ
// thỉnh thoảng để xem có phiên bản mới hơn trên web hay không. Nếu là của bạn
// site ngăn chặn truy cập từ bên ngoài vào web, quá trình kiểm tra này sẽ hết thời gian. Tuy nhiên
// bạn có thể tránh hết thời gian chờ và dừng MRBS kiểm tra các phiên bản cập nhật bằng cách
// thiết lập $ zoneinfo_update = false;
$zoneinfo_update = true;

// The VTIMEZONE definitions exist in two forms - normal and Outlook compatible.
// $zoneinfo_outlook_compatible determines which ones to use.

// Định nghĩa VTIMEZONE tồn tại ở hai dạng - bình thường và tương thích với Outlook.
// $ zoneinfo_outlook_comp Tương thích xác định cái nào sẽ sử dụng.
$zoneinfo_outlook_compatible = true;

// The VTIMEZONE definitions are cached in the database with an expiry time
// of $zoneinfo_expiry seconds.   If your server does not have external internet
// access set $zoneinfo_expiry to PHP_INT_MAX to prevent MRBS from trying to
// update the VTIMEZONE definitions.

// Định nghĩa VTIMEZONE được lưu trong cơ sở dữ liệu với thời gian hết hạn
// của $ zoneinfo_expiry giây. Nếu máy chủ của bạn không có internet bên ngoài
// truy cập đặt $ zoneinfo_expiry thành PHP_INT_MAX để ngăn MRBS cố gắng
// cập nhật định nghĩa VTIMEZONE.
$zoneinfo_expiry = 60*60*24*7;    // 7 days

/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL
// ("mysqli" is also supported for historical reasons and is mapped to "mysql")
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
$db_login = "mrbs";
// Database login password:
$db_password = 'mrbs-password';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Set $db_persist to true to use PHP persistent (pooled) database connections.  Note
// that persistent connections are not recommended unless your system suffers significant
// performance problems without them.   They can cause problems with transactions and
// locks (see http://php.net/manual/en/features.persistent-connections.php) and although
// MRBS tries to avoid those problems, it is generally better not to use persistent
// connections if you can.

// Đặt $ db_persist thành true để sử dụng các kết nối cơ sở dữ liệu liên tục (gộp chung) PHP. Ghi chú
// rằng các kết nối liên tục không được khuyến nghị trừ khi hệ thống của bạn gặp phải vấn đề nghiêm trọng
// vấn đề hiệu suất mà không có chúng. Chúng có thể gây ra sự cố với các giao dịch và
// khóa (xem http://php.net/manual/en/features.persists-connections.php) và mặc dù
// MRBS cố gắng tránh những vấn đề đó, nói chung tốt hơn là không sử dụng dai dẳng
// kết nối nếu bạn có thể.
$db_persist = false;
// The number of times to retry getting a database connection in the event that there are
// too many connections.  [MySQL only at the moment]

// Số lần thử lấy lại kết nối cơ sở dữ liệu trong trường hợp có
// Quá nhiều kết nối. [Chỉ MySQL tại thời điểm này]
$db_retries = 2;
// The number of milliseconds to wait before retrying.  [MySQL only at the moment]
// Số mili giây phải đợi trước khi thử lại. [Chỉ MySQL tại thời điểm này]
$db_delay = 750; // milliseconds


/*********************************
 * Site identification information
 *********************************/

// Set to true to enable multisite operation, in which case the settings below are for the
// home site, identified by the empty string ''.   Other sites have their own supplementary
// config fies in the sites/<sitename> directory.

// Đặt thành true để bật hoạt động nhiều trang, trong trường hợp đó, các cài đặt bên dưới dành cho
// trang chủ, được xác định bằng chuỗi trống ''. Các trang web khác có phần bổ sung của riêng họ
// cấu hình nằm trong thư mục sites / <sitename>.
$multisite = false;
$default_site = '';

$mrbs_admin = "Your Administrator";
$mrbs_admin_email = "admin_email@your.org";
// NOTE:  there are more email addresses in $mail_settings below.    You can also give
// email addresses in the format 'Full Name <address>', for example:
// $mrbs_admin_email = 'Booking System <admin_email@your.org>';
// if the name section has any "peculiar" characters in it, you will need
// to put the name in double quotes, e.g.:
// $mrbs_admin_email = '"Bloggs, Joe" <admin_email@your.org>';

// The company name is mandatory.   It is used in the header and also for email notifications.
// The company logo, additional information and URL are all optional.

// LƯU Ý: có nhiều địa chỉ email hơn trong $ mail_settings bên dưới. Bạn cũng có thể cho
// địa chỉ email ở định dạng 'Tên đầy đủ <địa chỉ>', ví dụ:
// $ mrbs_admin_email = 'Hệ thống đặt chỗ <admin_email@your.org>';
// nếu phần tên có bất kỳ ký tự "đặc biệt" nào trong đó, bạn sẽ cần
// để đặt tên trong dấu ngoặc kép, ví dụ:
// $ mrbs_admin_email = '"Bloggs, Joe" <admin_email@your.org>';

// Tên công ty là bắt buộc. Nó được sử dụng trong tiêu đề và cũng cho các thông báo qua email.
// Logo công ty, thông tin bổ sung và URL đều là tùy chọn.
$mrbs_company = "Công ty CP Nhựa Thiếu Niên Tiền Phong";   
// This line must always be uncommented ($mrbs_company is used in various places)

// Dòng này phải luôn được bỏ ghi chú ($ mrbs_company được sử dụng ở nhiều nơi khác nhau)

// Uncomment this next line to use a logo instead of text for your organisation in the header
// Bỏ ghi chú dòng tiếp theo này để sử dụng biểu trưng thay vì văn bản cho tổ chức của bạn trong tiêu đề
$mrbs_company_logo = "https://nhuatienphong.vn/main/imgs/ntp/logo2.png";    
// name of your logo file.   This example assumes it is in the MRBS directory

// Uncomment this next line for supplementary information after your company name or logo.
// This can contain HTML, for example if you want to include a link.
//$mrbs_company_more_info = "You can put additional information here";  // e.g. "XYZ Department"

// Uncomment this next line to have a link to your organisation in the header
//$mrbs_company_url = "http://www.your_organisation.com/";

// This is to fix URL problems when using a proxy in the environment.
// If links inside MRBS or in email notifications appear broken, then specify here the URL of
// your MRBS root directory, as seen by the users. For example:
// $url_base =  "http://example.com/mrbs";

// tên tệp biểu trưng của bạn. Ví dụ này giả sử nó nằm trong thư mục MRBS

// Bỏ ghi chú dòng tiếp theo này để biết thông tin bổ sung sau tên hoặc logo công ty của bạn.
// Điều này có thể chứa HTML, chẳng hạn như nếu bạn muốn bao gồm một liên kết.
// $ mrbs_company_more_info = "Bạn có thể thêm thông tin ở đây"; // ví dụ. "Bộ phận XYZ"

// Bỏ ghi chú dòng tiếp theo này để có liên kết đến tổ chức của bạn trong tiêu đề
// $ mrbs_company_url = "http://www.your_organisation.com/";

// Điều này là để khắc phục sự cố URL khi sử dụng proxy trong môi trường.
// Nếu các liên kết bên trong MRBS hoặc trong thông báo qua email xuất hiện bị hỏng, hãy chỉ định tại đây URL của
// thư mục gốc MRBS của bạn, như người dùng đã nhìn thấy. Ví dụ:
// $ url_base = "http://example.com/mrbs";

/*******************
 * Themes
 *******************/

// Choose a theme for the MRBS.   The theme controls two aspects of the look and feel:
//   (a) the styling:  the most commonly changed colours, dimensions and fonts have been
//       extracted from the main CSS file and put into the styling.inc file in the appropriate
//       directory in the Themes directory.   If you want to change the colour scheme, you should
//       be able to do it by changing the values in the theme file.    More advanced styling changes
//       can be made by changing the rules in the CSS file.
//   (b) the header:  the header.inc file which contains the function used for producing the header.
//       This enables organisations to plug in their own header functions quite easily, in cases where
//       the desired corporate look and feel cannot be changed using the CSS alone and the mark-up
//       itself needs to be changed.
//
//  MRBS will look for the files "styling.inc" and "header.inc" in the directory Themes/$theme and
//  if it can't find them will use the files in Themes/default.    A theme directory can contain
//  a replacement styling.inc file or a replacement header.inc file or both.

// Available options are:

// "default"        Default MRBS theme
// "classic126"     Same colour scheme as MRBS 1.2.6

// Chọn chủ đề cho MRBS. Chủ đề kiểm soát hai khía cạnh của giao diện:
// (a) kiểu dáng: màu sắc, kích thước và phông chữ được thay đổi phổ biến nhất đã được
// được trích xuất từ ​​tệp CSS chính và đưa vào tệp styles.inc phù hợp
// thư mục trong thư mục Chủ đề. Nếu bạn muốn thay đổi bảng màu, bạn nên
// có thể làm điều đó bằng cách thay đổi các giá trị trong tệp chủ đề. Thay đổi kiểu dáng nâng cao hơn
// có thể được thực hiện bằng cách thay đổi các quy tắc trong tệp CSS.
// (b) the header: tệp header.inc chứa hàm được sử dụng để tạo tiêu đề.
// Điều này cho phép các tổ chức cài đặt các chức năng tiêu đề của riêng họ một cách khá dễ dàng, trong trường hợp
// không thể thay đổi giao diện công ty mong muốn bằng cách sử dụng CSS và đánh dấu
// chính nó cần được thay đổi.
//
// MRBS sẽ tìm kiếm các tệp "styles.inc" và "header.inc" trong thư mục Themes / $ theme và
// nếu không tìm thấy chúng sẽ sử dụng các tệp trong Chủ đề / default. Thư mục chủ đề có thể chứa
// tệp styles.inc thay thế hoặc tệp header.inc thay thế hoặc cả hai.

// Các tùy chọn có sẵn là:
$theme = "default";

// Use the $custom_css_url to override the standard MRBS CSS.
// Sử dụng $ custom_css_url để ghi đè CSS MRBS chuẩn.
//$custom_css_url = 'css/custom.css';

// Use the $custom_js_url to add your own JavaScript.
// Sử dụng $ custom_js_url để thêm JavaScript của riêng bạn.
//$custom_js_url = 'js/custom.js';


/*******************
 * Calendar settings
 *******************/

// MRBS has two different modes of operation: "times" and "periods".   "Times"
// based bookings allow you to define regular consecutive booking slots, eg every
// half an hour from 7.00 am to 7.00 pm.   "Periods" based bookings are useful
// in, for example, schools where the booking slots are of different lengths
// and are not consecutive because of change-over time or breaks.

// It is not possible to swap between these two options once bookings have
// been created and to have meaningful entries.  This is due to differences
// in the way that the data is stored.

// It is however possible to configure the system so that some areas operate in
// "periods" mode and others in "times" mode.    Therefore the configuration variable
// that determines the default setting for new areas appears together with other
// variables that can be set on a per-area basis in the file areadefaults.inc.php.
// This is done to draw attention to the fact that they are default settings for new
// areas only and to avoid frustration when trying to change settings for existing
// areas: this is done by editing the settings for an area using a web browser by
// following the "Rooms" link in MRBS.

// Không thể hoán đổi giữa hai tùy chọn này sau khi đặt chỗ có
// đã được tạo và có các mục có ý nghĩa. Điều này là do sự khác biệt
// theo cách dữ liệu được lưu trữ.

// Tuy nhiên, có thể cấu hình hệ thống để một số khu vực hoạt động
// chế độ "thời gian" và các chế độ khác ở chế độ "thời gian". Do đó, biến cấu hình
// xác định cài đặt mặc định cho các khu vực mới xuất hiện cùng với
// các biến có thể được đặt trên cơ sở từng vùng trong tệp areadefaults.inc.php.
// Điều này được thực hiện để thu hút sự chú ý đến thực tế rằng chúng là cài đặt mặc định cho
// khu vực chỉ và để tránh thất vọng khi cố gắng thay đổi cài đặt cho
// khu vực: điều này được thực hiện bằng cách chỉnh sửa cài đặt cho một khu vực bằng trình duyệt web bằng cách
// theo liên kết "Phòng" trong MRBS.

// TIMES SETTINGS
// --------------

// The times settings can all be configured on a per-area basis, so these variables
// appear in the areadefaults.inc.php file.
// Tất cả các cài đặt thời gian đều có thể được định cấu hình trên cơ sở từng khu vực, vì vậy các biến này
// xuất hiện trong tệp areadefaults.inc.php.


// PERIODS SETTINGS
// ----------------

// The "Periods" settings are used only in areas where the mode has
// been set to "Periods".
// Cài đặt "Khoảng thời gian" chỉ được sử dụng trong các khu vực mà chế độ có
// được đặt thành "Khoảng thời gian".

/******************
 * Booking policies
 ******************/

// Most booking policies can be configured on a per-area basis, so these variables
// appear in the areadefaults.inc.php file.
// Hầu hết các chính sách đặt phòng đều có thể được định cấu hình trên cơ sở từng khu vực, vì vậy các biến này
// xuất hiện trong tệp areadefaults.inc.php.

// The settings below are global policy settings
// Cài đặt bên dưới là cài đặt chính sách chung
// Set the maximum *number* of bookings that can be made by any one user, in an interval,
// which can be a day, week, month or year, or else in the future.  (A week is defined
// by the $weekstarts setting).   These are global settings, but you can additionally
// configure per area settings.   This would allow you to set policies such as allowing
// a maximum of 10 bookings per month in total with a maximum of 1 per day in Area A.

// Đặt * số lượng đặt trước tối đa * có thể được thực hiện bởi bất kỳ người dùng nào, trong một khoảng thời gian,
// có thể là ngày, tuần, tháng, năm hoặc những thứ khác trong tương lai. (Một tuần được xác định
// theo cài đặt $ weekstarts). Đây là những cài đặt chung, nhưng bạn cũng có thể
// cấu hình cài đặt cho từng khu vực. Điều này sẽ cho phép bạn thiết lập các chính sách như cho phép
// tổng cộng tối đa 10 lượt đặt phòng mỗi tháng với tối đa 1 lượt đặt chỗ mỗi ngày tại Khu vực A.
$max_per_interval_global_enabled['day']    = false;
$max_per_interval_global['day'] = 1;      // max 1 bookings per day in total
//tổng cộng tối đa 1 lượt đặt chỗ mỗi ngày
$max_per_interval_global_enabled['week']   = false;
$max_per_interval_global['week'] = 5;     // max 5 bookings per week in total
//tổng cộng tối đa 5 lượt đặt trước mỗi tuần
$max_per_interval_global_enabled['month']  = false;
$max_per_interval_global['month'] = 10;   // max 10 bookings per month in total
//tổng cộng tối đa 10 lượt đặt trước mỗi tháng
$max_per_interval_global_enabled['year']   = false;
$max_per_interval_global['year'] = 50;    // max 50 bookings per year in total

$max_per_interval_global_enabled['future'] = false;
$max_per_interval_global['future'] = 100; // max 100 bookings in the future in total
//tổng cộng tối đa 100 lượt đặt trước trong tương lai

// Set the maximum total *length* of bookings that can be made by any one user, in an interval,
// which can be a day, week, month or year, or else in the future.  (A week is defined
// by the $weekstarts setting).   These are global settings, but you can additionally
// configure per area settings.   This would allow you to set policies such as allowing a
// maximum of 10 hours per week in total with a maximum of 1 hour per day in Area A.
// These settings only apply to areas in "times" mode.

// Đặt tổng số * thời lượng * đặt trước tối đa có thể được thực hiện bởi bất kỳ người dùng nào, trong một khoảng thời gian,
// có thể là ngày, tuần, tháng, năm hoặc những thứ khác trong tương lai. (Một tuần được xác định
// theo cài đặt $ weekstarts). Đây là những cài đặt chung, nhưng bạn cũng có thể
// cấu hình cài đặt cho từng khu vực. Điều này sẽ cho phép bạn thiết lập các chính sách, chẳng hạn như cho phép
// tổng cộng tối đa là 10 giờ mỗi tuần với tối đa 1 giờ mỗi ngày trong Khu vực A.
// Các cài đặt này chỉ áp dụng cho các khu vực ở chế độ "thời gian".

$max_secs_per_interval_global_enabled['day']    = false;
$max_secs_per_interval_global['day'] = 60*60*2;      // max 2 hours per day in total
//tổng cộng tối đa 2h mỗi ngày
$max_secs_per_interval_global_enabled['week']   = false;
$max_secs_per_interval_global['week'] = 60*60*10;    // max 10 hours per week in total

$max_secs_per_interval_global_enabled['month']  = false;
$max_secs_per_interval_global['month'] = 60*60*25;   // max 25 hours per month in total

$max_secs_per_interval_global_enabled['year']   = false;
$max_secs_per_interval_global['year'] = 60*60*100;   // max 100 hours per year in total

$max_secs_per_interval_global_enabled['future'] = false;
$max_secs_per_interval_global['future'] = 60*60*100; // max 100 hours in the future in total

// Set the latest date for which you can make a booking.    This can be useful if you
// want to set an absolute date, eg the end of term, beyond which bookings cannot be made.
// If you want to set a relative date, eg no more than a week away, then this can be done
// using the area settings.   Note that it is possible to have both a relative and absolute
// date, eg "no more than a week away and in any case not past the end of term".
// Note that bookings are allowed on the $max_booking_date, but not after it.

// Đặt ngày muộn nhất mà bạn có thể đặt chỗ. Điều này có thể hữu ích nếu bạn
// muốn đặt một ngày tuyệt đối, ví dụ: ngày kết thúc kỳ hạn, quá thời hạn mà không thể thực hiện đặt chỗ.
// Nếu bạn muốn đặt một ngày tương đối, ví dụ không quá một tuần nữa, thì bạn có thể thực hiện điều này
// sử dụng cài đặt khu vực. Lưu ý rằng có thể có cả tương đối và tuyệt đối
// ngày, ví dụ: "không quá một tuần nữa và trong mọi trường hợp không quá cuối kỳ".
// Lưu ý rằng đặt chỗ được phép vào $ max_booking_date, nhưng không được phép đặt sau ngày đó.
$max_booking_date_enabled = false;
$max_booking_date = "2012-07-23";  // Must be a string in the format "yyyy-mm-dd"

// Set the earliest date for which you can make a booking.    This can be useful if you
// want to set an absolute date, eg the beginning of term, before which bookings cannot be made.
// If you want to set a relative date, eg no more than a week away, then this can be done
// using the area settings.   Note that it is possible to have both a relative and absolute
// date, eg "no earlier than a week away and in any case not before the beginning of term".
// Note that bookings are allowed on the $min_booking_date, but not before it.

// Đặt ngày sớm nhất mà bạn có thể đặt chỗ. Điều này có thể hữu ích nếu bạn
// muốn đặt một ngày tuyệt đối, ví dụ như ngày bắt đầu của kỳ hạn, trước đó không thể thực hiện đặt chỗ.
// Nếu bạn muốn đặt một ngày tương đối, ví dụ không quá một tuần nữa, thì bạn có thể thực hiện điều này
// sử dụng cài đặt khu vực. Lưu ý rằng có thể có cả tương đối và tuyệt đối
// ngày tháng, ví dụ "không sớm hơn một tuần và trong mọi trường hợp không phải trước ngày bắt đầu học kỳ".
// Lưu ý rằng đặt chỗ được phép vào $ min_booking_date, nhưng không được phép đặt trước.
$min_booking_date_enabled = true;
$min_booking_date = date("y-m-d");  // Must be a string in the format "yyyy-mm-dd"

// Set this to true if you want to prevent users editing or deleting approved bookings.
// Note that this setting only applies if booking approval is in force for the area.
// If it isn't in force you can prevent bookings being edited or deleted by using the
// min and max delete ahead settings.

//************************************************************** */
// Đặt giá trị này thành true nếu bạn muốn ngăn người dùng chỉnh sửa hoặc xóa các đặt chỗ đã được phê duyệt.
// Lưu ý rằng cài đặt này chỉ áp dụng nếu phê duyệt đặt chỗ có hiệu lực đối với khu vực.
// Nếu điều đó không có hiệu lực, bạn có thể ngăn việc chỉnh sửa hoặc xóa đặt chỗ bằng cách sử dụng
// cài đặt trước xóa tối thiểu và tối đa.
$approved_bookings_cannot_be_changed = false;

// Set this to true if you want to prevent users having a booking for two different rooms
// at the same time.
// Đặt giá trị này thành true nếu bạn muốn ngăn người dùng đặt hai phòng khác nhau
// đồng thời.
$prevent_simultaneous_bookings = false;

// Set this to true if you want to prevent bookings of a type that is invalid for a room
// Đặt giá trị này thành true nếu bạn muốn ngăn việc đặt loại phòng không hợp lệ
$prevent_invalid_types = true;

// The start of the booking day when using periods.  Because MRBS has
// no notion of when periods actually occur they are assumed to start
// at the time below when we are enforcing book ahead policies.
// The setting defines the time of day when bookings open.
// This should be a string in the format hh:mm using the 24 hour clock.

// Thời điểm bắt đầu của ngày đặt phòng khi sử dụng các khoảng thời gian. Bởi vì MRBS có
// không có khái niệm về thời điểm các khoảng thời gian thực sự xảy ra, chúng được giả định là bắt đầu
// tại thời điểm bên dưới khi chúng tôi đang thực thi các chính sách đặt trước.
// Cài đặt xác định thời gian trong ngày khi đặt chỗ mở.
// Đây phải là một chuỗi có định dạng hh: mm sử dụng đồng hồ 24 giờ.
$periods_booking_opens = '00:00';

// When setting max_create_ahead and max_delete_ahead policies, the time interval is normally
// measured to the end time of the booking.  This is to prevent users cheating the system by
// booking a very long slot with the start time just inside the limit and then either not using
// the early part of the booking, or else editing it down to what they actually need later.
// However this is not very intuitive for users who might expect the measurement to be relative
// to the start time, in which case this can be achieved by changing this setting to true.

// Khi đặt chính sách max_create_ahead và max_delete_ahead, khoảng thời gian là bình thường
// được đo đến thời điểm kết thúc đặt phòng. Điều này nhằm ngăn chặn người dùng gian lận hệ thống bằng cách
// đặt một vị trí rất dài với thời gian bắt đầu chỉ trong giới hạn và sau đó không sử dụng
// phần đầu của đặt phòng hoặc chỉnh sửa nó thành những gì họ thực sự cần sau đó.
// Tuy nhiên, điều này không trực quan lắm đối với những người dùng có thể mong đợi phép đo là tương đối
// đến thời gian bắt đầu, trong trường hợp này có thể đạt được điều này bằng cách thay đổi cài đặt này thành true.
$measure_max_to_start_time = false;

/******************
 * Display settings
 ******************/

// [These are all variables that control the appearance of pages and could in time
//  become per-user settings]

// [Đây là tất cả các biến kiểm soát sự xuất hiện của các trang và có thể kịp thời
// trở thành cài đặt cho mỗi người dùng]

// Start of week: 0 for Sunday, 1 for Monday, etc.

// Đầu tuần: 0 cho Chủ Nhật, 1 cho Thứ Hai, v.v.
$weekstarts = 0;

// Days of the week that are weekdays
// Các ngày trong tuần là các ngày trong tuần
$weekdays = array(0,1, 2, 3, 4, 5,6);

// Days of the week that should be hidden from display
// 0 for Sunday, 1 for Monday, etc.
// For example, if you want Saturdays and Sundays to be hidden set $hidden_days = array(0,6);
//
// By default the hidden days will be removed completely from the main table in the week and month
// views.   You can alternatively arrange for them to be shown as narrow, greyed-out columns
// by defining some custom CSS for the .hidden_day class.

// Các ngày trong tuần cần được ẩn khỏi hiển thị
// 0 cho Chủ Nhật, 1 cho Thứ Hai, v.v.
// Ví dụ, nếu bạn muốn ẩn các ngày thứ bảy và chủ nhật, hãy đặt $ hidden_days = array (0,6);
//
// Theo mặc định, các ngày bị ẩn sẽ bị xóa hoàn toàn khỏi bảng chính trong tuần và tháng
// lượt xem. Bạn có thể sắp xếp theo cách khác để chúng được hiển thị dưới dạng cột hẹp, màu xám
// bằng cách xác định một số CSS tùy chỉnh cho lớp .hides_day.
$hidden_days = array();

// Time format in pages. FALSE to show dates in 12 hour format, TRUE to show them
// in 24 hour format

// Định dạng thời gian trong các trang. FALSE để hiển thị ngày ở định dạng 12 giờ, TRUE để hiển thị chúng
// ở định dạng 24 giờ
$twentyfourhour_format = true;

// Formats used for dates and times.   For formatting options
// see http://php.net/manual/function.strftime.php.   Note that MRBS will automatically
// convert the following formats which are not supported on Windows: %e, %l, %P and %R.
// MRBS will use IntlDateFormatter if it exists in preference to strftime() and try and convert
// the strftime formats into an equivalent pattern for use with IntlDateFormatter.  The following
// strftime formats do not have an equivalent and are not supported: %u, %w, %U, %V, %W, %C,
// %g, $G, %l and %s.

// Các định dạng được sử dụng cho ngày và giờ. Đối với các tùy chọn định dạng
// xem http://php.net/manual/ Chức năng.strftime.php. Lưu ý rằng MRBS sẽ tự động
// chuyển đổi các định dạng sau không được hỗ trợ trên Windows:% e,% l,% P và% R.
// MRBS sẽ sử dụng IntlDateFormatter nếu nó tồn tại ưu tiên strftime () và thử chuyển đổi
// định dạng strftime thành một mẫu tương đương để sử dụng với IntlDateFormatter. Sau
// định dạng strftime không có định dạng tương đương và không được hỗ trợ:% u,% w,% U,% V,% W,% C,
//% g, $ G,% l và% s.
$strftime_format['date']               = "%A  %B %Y";  // Used in Day view
$strftime_format['date_short']         = "%x";           // Used in Search results
$strftime_format['dayname']            = "%A";           // Used in Month view
$strftime_format['dayname_edit']       = "%a";           // Used in edit_entry form
$strftime_format['weekview_date']      = "%b %e";        // Used in the table header in Week view
$strftime_format['weekview_headers']   = "%a<br>%e. %B";  // Used in the table header in Week view (all rooms)
$strftime_format['monthview_headers']  = "%a<br>%e";     // Used in the table header in Month view (all rooms)
$strftime_format['minical_monthname']  = "%B %Y";        // Used in mini calendar heading
$strftime_format['minical_dayname']    = "%a";           // Used in mini calendar heading
$strftime_format['mon']                = "%b";           // Used in date selectors
$strftime_format['ampm']               = "%p";
$strftime_format['time12']             = "%I:%M%p";      // 12 hour clock
$strftime_format['time24']             = "%H:%M";        // 24 hour clock
$strftime_format['datetime']           = "%c";           // Used in Help
$strftime_format['datetime12']         = "%I:%M%p - %A %d %B %Y";  // 12 hour clock
$strftime_format['datetime24']         = "%H:%M - %A %d %B %Y";    // 24 hour clock
// If you prefer dates as "10 Jul" instead of "Jul 10" ($dateformat = true in
// MRBS 1.4.5 and earlier) then use
// Nếu bạn thích ngày là "10 tháng 7" thay vì "10 tháng 7" ($ dateformat = true in
// MRBS 1.4.5 trở về trước) thì sử dụng

// $strftime_format['daymonth']        = "%d %b";
$strftime_format['daymonth']           = "%b %d";

// Used in the day/week/month views.  Note that for the week view we have to
// cater for three possible cases, for example:
//    Years differ:                   26 Dec 2016 - 1 Jan 2017
//    Years same, but months differ:  30 Jan - 5 Feb 2017
//    Years and months the same:      6 - 12 Feb 2017
// Note that the separator between the start and end of the week is just '-',
// so any spaces required need to put in the formats below.
$strftime_format['view_day']           = "%A %e %B %Y";
$strftime_format['view_month']         = "%B %Y";
$strftime_format['view_week_end']      = " %e %B %Y";
$strftime_format['view_week_start']    = "%e ";        // year and month the same
$strftime_format['view_week_start_m']  = "%e %B ";     // just the year the same
$strftime_format['view_week_start_y']  = "%e %B %Y ";  // years (and months) different

// Whether or not to display the timezone
// Có hiển thị múi giờ hay không
$display_timezone = false;

// Results per page for searching:
$search["count"] = 20;

// Page refresh time (in seconds). Set to 0 to disable.
// (Note that if MRBS detects that a client is on a metered network
// connection it will disable page refresh for that client.)

// Thời gian làm mới trang (tính bằng giây). Đặt thành 0 để tắt.
// (Lưu ý rằng nếu MRBS phát hiện thấy một máy khách đang ở trên một mạng được đo lường
// kết nối nó sẽ vô hiệu hóa tính năng làm mới trang cho ứng dụng khách đó.)
$refresh_rate = 0;

// Refresh rate (in seconds) for Ajax checking of valid bookings on the edit_entry page
// Set to 0 to disable.
// Tốc độ làm mới (tính bằng giây) để Ajax kiểm tra các đặt phòng hợp lệ trên trang edit_entry
// Đặt thành 0 để tắt.
$ajax_refresh_rate = 10;

// Refresh rate for page pre-fetches in the calendar views.   MRBS tries to improve
// performance of navigation between pages in the calendar view by pre-fetching some
// pages.   This setting determines how often (in seconds) the pre-fetches should be
// refreshed in order to keep them from getting out of date.  Set to 0 to disable.

// Tốc độ làm mới cho các lần tìm nạp trước trang trong chế độ xem lịch. MRBS cố gắng cải thiện
// hiệu suất điều hướng giữa các trang trong chế độ xem lịch bằng cách tìm nạp trước một số
// trang. Cài đặt này xác định tần suất (tính bằng giây) của các lần tìm nạp trước
// được làm mới để giữ cho chúng không bị lỗi thời. Đặt thành 0 để tắt.
$prefetch_refresh_rate = 30;

// Entries in monthly view can be shown as start/end slot, brief description or
// both. Set to "description" for brief description, "slot" for time slot and
// "both" for both. Default is "both", but 6 entries per day are shown instead
// of 12.

// Các mục nhập trong chế độ xem hàng tháng có thể được hiển thị dưới dạng vị trí bắt đầu / kết thúc, mô tả ngắn gọn hoặc
// cả hai. Đặt thành "mô tả" cho mô tả ngắn gọn, "thời điểm" cho khoảng thời gian và
// "cả hai" cho cả hai. Mặc định là "cả hai", nhưng 6 mục nhập mỗi ngày được hiển thị thay vì 12 mục.
$monthly_view_entries_details = "both";

// To show ISO week numbers, set this to true
// Để hiển thị số tuần ISO, hãy đặt giá trị này thành true
$view_week_number = false;

// Whether or not the mini-calendars are displayed.  (Note that mini-calendars are only
// displayed anyway if the window is wide enough.)

// Lịch mini có được hiển thị hay không. (Lưu ý rằng lịch mini chỉ hiển thị nếu cửa sổ đủ rộng.)
$display_mincals = true;

// If the window is too narrow the mini-calendars are normally not displayed.  However by
// setting the following variable to true they will be displayed above the main calendar,
// provided the window is high enough.

// Nếu cửa sổ quá hẹp, các lịch nhỏ thường không được hiển thị. Tuy nhiên bởi
// đặt biến sau thành true, chúng sẽ được hiển thị phía trên lịch chính,
// miễn là cửa sổ đủ cao.
$display_mincals_above = false;

// To display week numbers in the mini-calendars, set this to true. The week
// numbers are only accurate if you set $weekstarts to 1, i.e. set the
// start of the week to Monday

// Để hiển thị số tuần trong lịch nhỏ, hãy đặt giá trị này thành true. Tuần
// số chỉ chính xác nếu bạn đặt $ weekstarts thành 1, tức là đặt
// đầu tuần đến thứ hai
$mincals_week_numbers = false;

// To display the endtime in the slot description, eg '09:00-09:30' instead of '09:00', set
// this to true.

// Để hiển thị thời gian kết thúc trong mô tả vị trí, ví dụ: '09: 00-09: 30 'thay vì '09: 00', hãy đặt
// điều này thành true.
$show_slot_endtime = false;

// To display the row labels (times, rooms or days) on the right hand side as well as the
// left hand side in the day and week views, set to true;
// (was called $times_right_side in earlier versions of MRBS)

// Để hiển thị các nhãn hàng (thời gian, phòng hoặc ngày) ở phía bên phải cũng như
// bên trái trong chế độ xem ngày và tuần, được đặt thành true;
// (được gọi là $ times_right_side trong các phiên bản MRBS trước đó)
$row_labels_both_sides = false;

// To display the column headers (times, rooms or days) on the bottom of the table as
// well as the top in the day and week views, set to true;

// Để hiển thị các tiêu đề cột (thời gian, phòng hoặc ngày) ở cuối bảng dưới dạng
// cũng như hàng đầu trong chế độ xem ngày và tuần, được đặt thành true;
$column_labels_both_ends = false;

// Show a line in the day and week views corresponding to the current time

// Hiển thị một dòng trong chế độ xem ngày và tuần tương ứng với thời gian hiện tại
$show_timeline = true;

// For bookings that allow registration, show the number of people that have
// registered and, if there is one, the registration limit.  This will typically
// be appended to the description in the calendar view, eg "Lecture [12/40]".
// The way the registration level is presented can be changed with a

// Đối với các đặt chỗ cho phép đăng ký, hãy hiển thị số người có
// đã đăng ký và nếu có thì giới hạn đăng ký. Điều này thường sẽ
// được thêm vào mô tả trong chế độ xem lịch, ví dụ "Bài giảng [12/40]".
// Cách trình bày mức đăng ký có thể được thay đổi bằng
// $vocab_override config setting.
$show_registration_level = true;

// Define default starting view (month, week or day)
// Default is day

// Xác định chế độ xem bắt đầu mặc định (tháng, tuần hoặc ngày)
// Mặc định là ngày
$default_view = "month";

// The default setting for the week and month views: whether to view all the
// rooms (true) or not (false).

// Cài đặt mặc định cho chế độ xem và tháng: có chế độ xem tất cả
// phòng (true) hoặc không (false).
$default_view_all = true;

// Define default room to start with (used by index.php)
// Room numbers can be determined by looking at the Edit or Delete URL for a
// room on the admin page.
// Default is 0

// Xác định phòng mặc định để bắt đầu (được sử dụng bởi index.php)
// Số phòng có thể được xác định bằng cách xem URL Chỉnh sửa hoặc Xóa để tìm
// phòng trên trang quản trị.
// Mặc định là 0
$default_room = 0;

// Define clipping behaviour for the cells in the day and week views.
// Set to true if you want the cells in the day and week views to be clipped.   This
// gives a table where all the rows have the same height, regardless of content.
// Alternatively set to false if you want the cells to expand to fit the content.
// (false not supported in IE6 and IE7 due to their incomplete CSS support)

// Xác định hành vi cắt cho các ô trong chế độ xem ngày và tuần.
// Đặt thành true nếu bạn muốn cắt bớt các ô trong chế độ xem ngày và tuần. Đây
// đưa ra một bảng trong đó tất cả các hàng có cùng chiều cao, bất kể nội dung.
// Hoặc đặt thành false nếu bạn muốn các ô mở rộng để phù hợp với nội dung.
// (false không được hỗ trợ trong IE6 và IE7 do hỗ trợ CSS không đầy đủ của chúng)
$clipped = true;

// Define clipping behaviour for the cells in the month view.
// Set to true if you want all entries to have the same height. The
// short description may be clipped in this case. If set to false,
// each booking entry will be large enough to display all information.

// Xác định hành vi cắt cho các ô trong chế độ xem tháng.
// Đặt thành true nếu bạn muốn tất cả các mục nhập có cùng chiều cao. Các
// mô tả ngắn có thể được cắt bớt trong trường hợp này. Nếu được đặt thành false,
// mỗi mục đặt chỗ sẽ đủ lớn để hiển thị tất cả thông tin.
$clipped_month = true;

// Set to true if you want the cells in the month view to scroll if there are too
// many bookings to display; set to false if you want the table cell to expand to
// accommodate the bookings.

// Đặt thành true nếu bạn muốn các ô trong chế độ xem tháng cuộn nếu có
// nhiều đặt chỗ để hiển thị; đặt thành false nếu bạn muốn ô trong bảng mở rộng thành
// điều chỉnh các đặt chỗ.
$month_cell_scrolling = true;

// Define the maximum length of a string that can be displayed in an admin table cell
// (eg the rooms and users lists) before it is truncated.  (This is necessary because
// you don't want a cell to contain for example a 2 kbyte text string, which could happen
// with user defined fields).

// Xác định độ dài tối đa của một chuỗi có thể được hiển thị trong ô bảng quản trị
// (ví dụ: phòng và danh sách người dùng) trước khi nó bị cắt bớt. (Điều này là cần thiết vì
// bạn không muốn một ô chứa chuỗi văn bản 2 kbyte, ví dụ, điều này có thể xảy ra
// với các trường do người dùng định nghĩa).
$max_content_length = 20;  // characters

// The maximum length of a database field for which a text input can be used on a form
// (eg when editing a user or room).  If longer than this a text area will be used.

// Độ dài tối đa của trường cơ sở dữ liệu mà đầu vào văn bản có thể được sử dụng trên biểu mẫu
// (ví dụ: khi chỉnh sửa người dùng hoặc phòng). Nếu dài hơn mức này, một vùng văn bản sẽ được sử dụng.
$text_input_max = 70;  // characters

// For inputs that have autocomplete options, eg the area and room match inputs on
// the report page, we can define how many characters need to be input before the
// options are displayed.  This enables us to prevent a huge long list of options
// being presented.   We define the breakpoints in an array.   For example if we set
// $autocomplete_length_breaks = array(25, 250, 2500); this means that if the number of options
// is less than 25 then they will be displayed when 0 characters are input, ie the input
// receives focus.   If the number of options is less than 250 then they will be displayed
// when 1 character is input and so on.    The array can be as long as you like.   If it
// is empty then the options are displayed when 0 characters are input.

// [Note: this variable is only applicable to older browsers that do not support the
// <datalist> element and instead fall back to a JavaScript emulation.   Browsers that
// support <datalist> present the options in a scrollable select box]

// Đối với các đầu vào có tùy chọn tự động hoàn thành, ví dụ: đầu vào đối sánh khu vực và phòng được bật
// trang báo cáo, chúng tôi có thể xác định số lượng ký tự cần được nhập trước
// các tùy chọn được hiển thị. Điều này cho phép chúng tôi ngăn chặn một danh sách dài các tùy chọn
// đang được trình bày. Chúng tôi xác định các điểm ngắt trong một mảng. Ví dụ: nếu chúng tôi đặt
// $ autocomplete_length_breaks = array (25, 250, 2500); điều này có nghĩa là nếu số lượng tùy chọn
// nhỏ hơn 25 thì chúng sẽ được hiển thị khi nhập 0 ký tự, tức là đầu vào
// nhận tiêu điểm. Nếu số lượng tùy chọn nhỏ hơn 250 thì chúng sẽ được hiển thị
// khi 1 ký tự được nhập, v.v. Mảng có thể dài bao nhiêu tùy thích. Nếu nó
// trống thì các tùy chọn được hiển thị khi nhập 0 ký tự.

// [Lưu ý: biến này chỉ áp dụng cho các trình duyệt cũ hơn không hỗ trợ
// phần tử <datalist> và thay vào đó trở lại mô phỏng JavaScript. Các trình duyệt
// support <datalist> trình bày các tùy chọn trong hộp chọn có thể cuộn]
$autocomplete_length_breaks = array(25, 250, 2500);

// The default orientation for PDF output
// Options: 'portrait' or 'landscape'

// Hướng mặc định cho đầu ra PDF
// Tùy chọn: 'dọc' hoặc 'ngang'
$pdf_default_orientation = 'portrait';

// The default paper size for PDF output
// Options: 'A3', 'A4', 'A5', 'LEGAL', 'LETTER' or 'TABLOID'
$pdf_default_paper = 'A4';

// Whether to sort users by their last names or not
// Có sắp xếp người dùng theo họ của họ hay không
$sort_users_by_last_name = false;

/************************
 * Miscellaneous settings
 ************************/

// Maximum repeating entries (max needed +1):
//Các mục nhập lặp lại tối đa (tối đa cần +1):
$max_rep_entrys = 365 + 1;

// Default report span in days:
// Khoảng báo cáo mặc định tính bằng ngày:
$default_report_days = 60;

$show_plus_link = false;   // Change to true to always show the (+) link as in
                           // MRBS 1.1.


// PRIVATE BOOKINGS SETTINGS
// Khoảng báo cáo mặc định tính bằng ngày:...

// Note:  some settings for private bookings can be set on a per-area basis and
// so appear in the areadefaults.inc.php file
// Lưu ý: một số cài đặt cho đặt chỗ riêng có thể được đặt trên cơ sở từng khu vực và
// xuất hiện trong tệp areadefaults.inc.php

// Choose which fields should be private by setting
// $is_private_field['tablename.columnname'] = true
// At the moment only fields in the entry and users table can be marked as private,
// including custom fields, but with the exception of the following entry table fields:
// start_time, end_time, entry_type, repeat_id, room_id, timestamp, type, status,
// reminded, info_time, info_user, info_text.

// Chọn trường nào nên ở chế độ riêng tư bằng cách cài đặt
// $ is_private_field ['tablename.columnname'] = true
// Hiện tại, chỉ các trường trong bảng mục nhập và người dùng mới có thể được đánh dấu là riêng tư,
// bao gồm các trường tùy chỉnh, nhưng ngoại trừ các trường của bảng mục nhập sau:
// start_time, end_time, entry_type, repeat_id, room_id, timestamp, type, status,
// đã nhắc nhở, info_time, info_user, info_text.
$is_private_field['entry.name'] = true;
$is_private_field['entry.description'] = true;
$is_private_field['entry.create_by'] = true;
$is_private_field['entry.modified_by'] = true;


// SETTINGS FOR APPROVING BOOKINGS - PER-AREA

// These settings can all be be configured on a per-area basis, so these variables
// appear in the areadefaults.inc.php file.


// SETTINGS FOR APPROVING BOOKINGS - GLOBAL

// These settings are system-wide and control the behaviour in all areas.

// Interval before reminders can be issued (in seconds).   Only
// working days (see below) are included in the calculation

// CÀI ĐẶT ĐỂ PHÊ DUYỆT ĐẶT CHỖ - MỖI VÙNG

// Tất cả các cài đặt này đều có thể được định cấu hình trên cơ sở từng khu vực, vì vậy các biến này
// xuất hiện trong tệp areadefaults.inc.php.


// CÀI ĐẶT ĐỂ PHÊ DUYỆT ĐẶT CHỖ - TOÀN CẦU

// Các cài đặt này trên toàn hệ thống và kiểm soát hành vi trong tất cả các lĩnh vực.

// Khoảng thời gian trước khi có thể đưa ra lời nhắc (tính bằng giây). Chỉ có
// ngày làm việc (xem bên dưới) được bao gồm trong tính toán
$reminder_interval = 60*60*24*2;  // 2 working days

// Days of the week that are working days (Sunday = 0, etc.)
$working_days = array(1,2,3,4,5);  // Mon-Fri


// SETTINGS FOR BOOKING CONFIRMATION

// These settings can all be be configured on a per-area basis, so these variables
// appear in the areadefaults.inc.php file.


/***********************************************
 * Form values
 ***********************************************/

 $select_options  = array();
// It is possible to constrain some form values to be selected from a drop-
// down select box, rather than allowing free form input.   This is done by
// putting the permitted options in an array as part of the $select_options
// two-dimensional array.   The first index specifies the form field in the
// format tablename.columnname.    For example to restrict the name of a booking
// to 'Physics', 'Chemistry' or 'Biology' uncomment the line below.
// Có thể giới hạn một số giá trị biểu mẫu được chọn từ một drop-
// xuống hộp chọn, thay vì cho phép nhập biểu mẫu tự do. Điều này được thực hiện bởi
// đưa các tùy chọn được phép vào một mảng như một phần của $ select_options
// mảng hai chiều. Chỉ mục đầu tiên chỉ định trường biểu mẫu trong
// định dạng tablename.columnname. Ví dụ: để hạn chế tên của một đặt chỗ
// thành 'Vật lý', 'Hóa học' hoặc 'Sinh học' bỏ ghi chú dòng bên dưới.

//$select_options['entry.name'] = array('Physics', 'Chemistry', 'Biology');

// At the moment $select_options is only supported as follows:
//     - Entry table: name, description and custom fields
//     - Users table: custom fields
// Hiện tại $ select_options chỉ được hỗ trợ như sau:
// - Bảng mục: tên, mô tả và các trường tùy chỉnh
// - Bảng người dùng: các trường tùy chỉnh

// For custom fields only (will be extended later) it is also possible to use
// an associative array for $select_options, for example
// Chỉ dành cho các trường tùy chỉnh (sẽ được mở rộng sau này), bạn cũng có thể sử dụng
// một mảng kết hợp cho $ select_options chẳng hạn

//$select_options['entry.catering'] = array('c' => 'Coffee',
//                                          's' => 'Sandwiches',
//                                          'h' => 'Hot Lunch');

// In this case the key (eg 'c') is stored in the database, but the value
// (eg 'Coffee') is displayed and can be searched for using Search and Report.
// This allows you to alter the displayed values, for example changing 'Coffee'
// to 'Coffee, Tea and Biscuits', without having to alter the database.   It can also
// be useful if the database table is being shared with another application.
// MRBS will auto-detect whether the array is associative.
// Trong trường hợp này, khóa (ví dụ: 'c') được lưu trữ trong cơ sở dữ liệu, nhưng giá trị
// (ví dụ: 'Cà phê') được hiển thị và có thể được tìm kiếm bằng Tìm kiếm và Báo cáo.
// Điều này cho phép bạn thay đổi các giá trị được hiển thị, ví dụ như thay đổi 'Cà phê'
// tới 'Coffee, Tea and Biscuits', mà không cần phải thay đổi cơ sở dữ liệu. Nó cũng có thể
// hữu ích nếu bảng cơ sở dữ liệu đang được chia sẻ với một ứng dụng khác.
// MRBS sẽ tự động phát hiện xem mảng có liên kết hay không.
//
// Note that an array such as
// Lưu ý rằng một mảng chẳng hạn như
//
// $select_options['entry.catering'] = array('2' => 'Coffee',
//                                           '4' => 'Sandwiches',
//                                           '5' => 'Hot Lunch');
//
// will be treated as a simple indexed array rather than as an associative array.
// That's because (a) strictly speaking PHP does not distinguish between indexed
// and associative arrays and (b) PHP will cast any string key that looks like a
// valid integer into an integer.
// sẽ được coi là một mảng được lập chỉ mục đơn giản hơn là một mảng kết hợp.
// Đó là bởi vì (a) nói đúng ra PHP không phân biệt giữa được lập chỉ mục
// và các mảng kết hợp và (b) PHP sẽ ép bất kỳ khóa chuỗi nào trông giống như
// số nguyên hợp lệ thành số nguyên.
//
// If you want to make the select field a mandatory field (see below) then include
// an empty string as one of the values, eg
// Nếu bạn muốn đặt trường chọn thành trường bắt buộc (xem bên dưới) thì hãy bao gồm
// một chuỗi rỗng là một trong các giá trị, ví dụ:
//
//$select_options['entry.catering'] = array(''  => 'Please select one option',
//                                          'c' => 'Coffee',
//                                          's' => 'Sandwiches',
//                                          'h' => 'Hot Lunch');


$datalist_options = array();
// Instead of restricting the user to a fixed set of options using $select_options,
// you can provide a list of options which will be used as suggestions, but the
// user will also be able to type in their own input.   (MRBS presents these using
// an HTML5 <datalist> element in browsers that support it, falling back to a
// JavaScript emulation in browsers that don't - except for IE6 and below where
// an ordinary text input field is presented).
// Thay vì giới hạn người dùng trong một tập hợp các tùy chọn cố định bằng cách sử dụng $ select_options,
// bạn có thể cung cấp danh sách các tùy chọn sẽ được sử dụng làm đề xuất, nhưng
// người dùng cũng sẽ có thể nhập đầu vào của riêng họ. (MRBS trình bày những điều này bằng cách sử dụng
// một phần tử <datalist> HTML5 trong các trình duyệt hỗ trợ nó, trở lại
// Mô phỏng JavaScript trong các trình duyệt không - ngoại trừ IE6 trở xuống, nơi
// một trường nhập văn bản thông thường được hiển thị).
//
// As with $select_options, the array can be either a simple indexed array or an
// associative array, eg array('AL' => 'Alabama', 'AK' => 'Alaska', etc.).   However
// some users might find an associative array confusing as the key is entered in the input
// field when the corresponding value is selected.
// Như với $ select_options, mảng có thể là một mảng được lập chỉ mục đơn giản hoặc một
// mảng kết hợp, ví dụ mảng ('AL' => 'Alabama', 'AK' => 'Alaska', v.v.). Tuy nhiên
// một số người dùng có thể thấy một mảng kết hợp khó hiểu vì khóa được nhập vào đầu vào
// trường khi giá trị tương ứng được chọn.
//
// At the moment $datalist_options is only supported for the same fields as
// Hiện tại $ datalist_options chỉ được hỗ trợ cho các trường giống như
// $select_options (see above for details)


$is_mandatory_field = array();
// You can define custom entry fields and some of the standard fields (description
// and type) to be mandatory by setting items in the array $is_mandatory_field.
// (Note that making a checkbox field mandatory means that the box must be checked.)
// Bạn có thể xác định các trường mục nhập tùy chỉnh và một số trường tiêu chuẩn (mô tả
// và kiểu) là bắt buộc bằng cách đặt các mục trong mảng $ is_mandatory_field.
// (Lưu ý rằng việc tạo trường hộp kiểm là bắt buộc có nghĩa là hộp đó phải được chọn.)
// For example:

// $is_mandatory_field['entry.type'] = true;
// $is_mandatory_field['entry.terms_and_conditions'] = true;

$is_mandatory_field['users.display_name'] = true;

// You can also enter regular expressions for validating text field input using
// the pattern attribute.  At the moment this is limited to custom fields in the
// users table.  For example the following could be used to ensure a valid US ZIP
// code (you might want to have a better regex - this is just for illustration):
// Bạn cũng có thể nhập các biểu thức chính quy để xác thực đầu vào trường văn bản bằng cách sử dụng
// thuộc tính mẫu. Hiện tại, điều này được giới hạn cho các trường tùy chỉnh trong
// bảng người dùng. Ví dụ, bạn có thể sử dụng phần sau để đảm bảo mã ZIP của Hoa Kỳ hợp lệ
// code (bạn có thể muốn có một regex tốt hơn - cái này chỉ để minh họa):

// $pattern['users.zip_code'] = "^[0-9]{5}(?:-[0-9]{4})?$";

// You would probably also want to enter a custom error message by using
// $vocab_override, with the tag consisting of "table.field.oninvalid" eg
// Bạn cũng có thể muốn nhập thông báo lỗi tùy chỉnh bằng cách sử dụng
// $ vocab_override, với thẻ bao gồm "table.field.oninvalid", ví dụ:
// $vocab_override['users.zip_code.oninvalid']['en'] = "Please enter a valid ZIP code, eg '12345' or '12345-6789'";


// Set this to false if you do not want to have the ability to create events for which
// other people can register.
// Đặt giá trị này thành false nếu bạn không muốn có khả năng tạo các sự kiện
// người khác có thể đăng ký.
$enable_registration = false;

// The default setting for new entries
// Cài đặt mặc định cho các mục nhập mới
$allow_registration_default = false;
// Whether a limit on the number of registrants is set by default
// Giới hạn về số lượng người đăng ký có được đặt theo mặc định hay không
$registrant_limit_enabled_default = true;
// The default maximum number of registrations allowed
// Số lượng đăng ký tối đa mặc định được phép
$registrant_limit_default = 1;
// Whether the registration opens time is enabled by default
// Thời gian mở đăng ký có được bật theo mặc định hay không
$registration_opens_enabled_default = false;
// The default time (in seconds) in advance of the start time when registration opens
// Thời gian mặc định (tính bằng giây) trước thời gian bắt đầu khi đăng ký mở
$registration_opens_default = 60*60*24*14; // 2 weeks
// Whether the registration closes time is enabled by default
// Thời gian đóng đăng ký có được bật theo mặc định hay không
$registration_closes_enabled_default = false;
// The default time (in seconds) in advance of the start time when registration closes
// Thời gian mặc định (tính bằng giây) trước thời gian bắt đầu khi đăng ký đóng
$registration_closes_default = 0;


// Set $skip_default to true if you want the "Skip past conflicts" box
// on the edit_entry form to be checked by default.  (This will mean that
// if you make a repeat booking and some of the repeat dates are already
// booked, MRBS will just skip past those).
// Đặt $ skip_default thành true nếu bạn muốn hộp "Bỏ qua xung đột trước đây"
// trên biểu mẫu edit_entry sẽ được kiểm tra theo mặc định. (Điều này có nghĩa là
// nếu bạn đặt phòng lặp lại và một số ngày lặp lại đã
// đã đặt trước, MRBS sẽ chỉ bỏ qua những người đó).
$skip_default = false;

// $edit_entry_field_order can be used to change the order of fields in the
// edit_entry page. This is useful to insert custom fields somewhere other than
// the end.  The same order is used for the view_entry page.

// For example: To place a custom field 'in_charge' directly after the
// booking name, set the following in config.inc.php:
//
// $edit_entry_field_order = array('name', 'in_charge');
//
// Valid entries in this array are: 'create_by', 'name', 'description', 'start_time',
// 'end_time', 'room_id', 'type', 'confirmation_status', 'privacy_status',
// plus any custom fields you may have defined. Fields that are not
// mentioned in the array are appended at the end, in their usual order.

// $ edit_entry_field_order có thể được sử dụng để thay đổi thứ tự của các trường trong
// trang edit_entry. Điều này rất hữu ích để chèn các trường tùy chỉnh ở một nơi khác ngoài
// kết thúc. Thứ tự tương tự được sử dụng cho trang view_entry.

// Ví dụ: Để đặt trường tùy chỉnh 'in_charge' ngay sau
// tên đặt chỗ, đặt thông tin sau trong config.inc.php:
//
// $ edit_entry_field_order = array ('name', 'in_charge');
//
// Các mục nhập hợp lệ trong mảng này là: 'create_by', 'name', 'description', 'start_time',
// 'end_time', 'room_id', 'type', 'Confirm_status', 'privacy_status',
// cộng với bất kỳ trường tùy chỉnh nào mà bạn có thể đã xác định. Các trường không
// được đề cập trong mảng được thêm vào cuối, theo thứ tự thông thường của chúng.
$edit_entry_field_order = array();

// You can so the same for the fields in the Search Criteria section of the report
// form.  Valid entries in this array are 'report_start', 'report_end', 'areamatch',
// 'roommatch', 'typematch', 'namematch', 'descrmatch', 'creatormatch', 'match_private',
// 'match_confirmed', 'match_approved', plus any custom fields you may have defined.

// Bạn có thể làm như vậy đối với các trường trong phần Tiêu chí Tìm kiếm của báo cáo
// hình thức. Các mục nhập hợp lệ trong mảng này là 'report_start', 'report_end', 'areamatch',
// 'roommatch', 'typematch', 'namematch', 'descrmatch', 'createormatch', 'match_private',
// 'match_conf Dead', 'match_approved', cộng với bất kỳ trường tùy chỉnh nào mà bạn có thể đã xác định.
$report_search_field_order = array();

// And the same for the fields in the Presentation Options section of the report form.
// Valid entries in this array are 'output', 'output_format', 'sortby' and 'sumby'.

// Và tương tự đối với các trường trong phần Tùy chọn trình bày của biểu mẫu báo cáo.
// Các mục nhập hợp lệ trong mảng này là 'output', 'output_format', 'sortby' và 'sumby'.
$report_presentation_field_order = array();


/***********************************************
 * Authentication settings - read AUTHENTICATION
 ***********************************************/

// NOTE: if you are using the 'joomla', 'saml' or 'wordpress' authentication type,
// then you must use the corresponding session scheme.

// LƯU Ý: nếu bạn đang sử dụng kiểu xác thực 'joomla', 'saml' hoặc 'wordpress',
// thì bạn phải sử dụng lược đồ phiên tương ứng.
$auth["type"] = "db"; // How to validate the user/password. One of
                      // "auth_basic", "cas", "config", "crypt", "db", "db_ext", "idcheck",
                      // "imap", "imap_php", "joomla", "ldap", "none", "nw", "pop3",
                      // "saml" or "wordpress".
// Cách xác thực người dùng / mật khẩu. Một trong
                       // "auth_basic", "cas", "config", "crypt", "db", "db_ext", "idcheck",
                       // "imap", "imap_php", "joomla", "ldap", "none", "nw", "pop3",
                       // "saml" hoặc "wordpress".

$auth["session"] = "php"; // How to get and keep the user ID. One of
                          // "cas", "cookie", "host", "http", "ip", "joomla", "nt",
                          // "omni", "php", "remote_user", "saml" or "wordpress".
                          // Cách lấy và giữ ID người dùng. Một trong
                           // "cas", "cookie", "host", "http", "ip", "joomla", "nt",
                           // "omni", "php", "remote_user", "saml" hoặc "wordpress".

// Configuration parameters for 'cookie' session scheme
// Tham số cấu hình cho lược đồ phiên 'cookie'

// The encryption secret key for the session tokens. You are strongly
// advised to change this if you use this session scheme
// Khóa bí mật mã hóa cho mã phiên. Bạn mạnh mẽ
// khuyên bạn nên thay đổi điều này nếu bạn sử dụng lược đồ phiên này
$auth["session_cookie"]["secret"] = "This isn't a very good secret!";
// The expiry time of a session, in seconds. Set to 0 to use session cookies
// Thời gian hết hạn của một phiên, tính bằng giây. Đặt thành 0 để sử dụng cookie phiên
$auth["session_cookie"]["session_expire_time"] = (60*60*24*30); // 30 days
// Whether to include the user's IP address in their session cookie.
// Increases security, but could cause problems with proxies/dynamic IP
// machines
// Có đưa địa chỉ IP của người dùng vào cookie phiên của họ hay không.
// Tăng cường bảo mật nhưng có thể gây ra sự cố với proxy / IP động
// máy móc
$auth["session_cookie"]["include_ip"] = true;
// The hash algorithm to use, must be supported by your version of PHP,
// see http://php.net/manual/en/function.hash-algos.php

// Thuật toán băm để sử dụng, phải được hỗ trợ bởi phiên bản PHP của bạn,
// xem http://php.net/manual/en/ Chức năng.hash-algos.php
$auth["session_cookie"]["hash_algorithm"] = 'sha512';

$csrf_cookie["hash_algorithm"] = 'sha512';
$csrf_cookie["secret"] = "This still isn't a very good secret!";

// Configuration parameters for 'php' session scheme

// The session name
$auth["session_php"]["session_name"] = 'MRBS_SESSID';

// The expiry time of a session cookie, in seconds
// N.B. Long session expiry times rely on PHP not retiring the session
// on the server too early. If you only want session cookies to be used,
// set this to 0.
// Thời gian hết hạn của cookie phiên, tính bằng giây
// N.B. Thời gian hết hạn phiên dài dựa vào việc PHP không ngừng phiên
// trên máy chủ quá sớm. Nếu bạn chỉ muốn sử dụng cookie phiên,
// đặt giá trị này thành 0.
$auth["session_php"]["session_expire_time"] = (60*60*24*30); // 30 days

// Set this to the expiry time for a session after a period of inactivity
// in seconds.   Setting to zero means that the sesion will not expire after
// a period of activity - but note that it will expire if the session cookie
// happens to expire (see above).  Note that if you have $refresh_rate set and
// your system is not capable of doing Ajax refreshes but instead uses a <meta>
// tag to do the refresh, then these refreshes will count as activity - this
// be the case if you have JavaScript disabled on the client.

// Đặt giá trị này thành thời gian hết hạn cho một phiên sau một thời gian không hoạt động
// trong vài giây. Đặt thành 0 có nghĩa là sesion sẽ không hết hạn sau
// một khoảng thời gian hoạt động - nhưng lưu ý rằng nó sẽ hết hạn nếu cookie phiên
// xảy ra hết hạn (xem ở trên). Lưu ý rằng nếu bạn đã đặt $ refresh_rate và
// hệ thống của bạn không có khả năng làm mới Ajax mà thay vào đó sử dụng <meta>
// để thực hiện làm mới, sau đó những lần làm mới này sẽ được tính là hoạt động - điều này
// là trường hợp nếu bạn đã tắt JavaScript trên máy khách.
$auth["session_php"]["inactivity_expire_time"] = 0; // seconds


// Cookie path override. If this value is set it will be used by the
// 'php' and 'cookie' session schemes to override the default behaviour
// of automatically determining the cookie path to use
//$cookie_path_override = '/mrbs/';
// Ghi đè cookie đường dẫn. If this value is set, it will be used by
// lược đồ 'php' và 'cookie' để ghi đè mặc định vi phạm
// tự động xác định cookie dẫn đường để sử dụng
// $ cookie_path_override = '/ mrbs /';

// The list of administrators (can modify other peoples settings).
// Danh sách quản trị viên (có thể sửa đổi cài đặt của những người khác).
//
// This list is not needed when using the 'db' authentication scheme EXCEPT
// when upgrading from a pre-MRBS 1.4.2 system that used db authentication.
// Pre-1.4.2 the 'db' authentication scheme did need this list.   When running
// edit_users.php for the first time in a 1.4.2 system or later, with an existing
// users list in the database, the system will automatically add a field to
// the table for access rights and give admin rights to those users in the database
// for whom admin rights are defined here.   After that this list is ignored.
// Danh sách này không cần thiết khi sử dụng lược đồ xác thực 'db' NGOẠI TRỪ
// khi nâng cấp từ hệ thống trước MRBS 1.4.2 đã sử dụng xác thực db.
// Trước 1.4.2, lược đồ xác thực 'db' cần danh sách này. Khi chạy
// edit_users.php lần đầu tiên trong hệ thống 1.4.2 trở lên, với một
// danh sách người dùng trong cơ sở dữ liệu, hệ thống sẽ tự động thêm trường vào
// bảng cho quyền truy cập và cấp quyền quản trị cho những người dùng đó trong cơ sở dữ liệu
// cho ai quyền quản trị viên được xác định ở đây. Sau đó danh sách này bị bỏ qua.

unset($auth["admin"]);              // Include this when copying to config.inc.php
$auth["admin"][] = "127.0.0.1";     // localhost IP address. Useful with IP sessions.
$auth["admin"][] = "administrator"; // A user name from the user list. Useful
                                    // with most other session schemes.
//$auth["admin"][] = "10.0.0.1";
//$auth["admin"][] = "10.0.0.2";
//$auth["admin"][] = "10.0.0.3";

// 'auth_config' user database
// Format: $auth["user"]["name"] = "password";
unset($auth["user"]);              // Include this when copying to config.inc.php
$auth["user"]["administrator"] = "secret";
$auth["user"]["alice"] = "a";
$auth["user"]["bob"] = "b";

// 'session_http' configuration settings
$auth["realm"]  = "mrbs";

// 'session_remote_user' configuration settings
//$auth['remote_user']['login_link'] = '/login/link.html';
//$auth['remote_user']['logout_link'] = '/logout/link.html';

// 'auth_ext' configuration settings
$auth["prog"]   = "";
$auth["params"] = "";

// 'auth_db' configuration settings
// The highest level of access (0=none; 1=user; 2+=admin).    Used in edit_users.php
// In the future we might want a higher level of granularity, eg to distinguish between
// different levels of admin
// cài đặt cấu hình 'auth_db'
// Cấp truy cập cao nhất (0 = none; 1 = user; 2 + = admin). Được sử dụng trong edit_users.php
// Trong tương lai, chúng tôi có thể muốn mức độ chi tiết cao hơn, ví dụ: để phân biệt giữa
// các cấp quản trị khác nhau
$max_level = 2;
// The lowest level of admin allowed to view other users
// Cấp quản trị viên thấp nhất được phép xem những người dùng khác
$min_user_viewing_level = 2;
// The lowest level of admin allowed to edit other users
// Cấp quản trị viên thấp nhất được phép chỉnh sửa người dùng khác
$min_user_editing_level = 2;
// The lowest level of admin allowed to edit other bookings
// Cấp quản trị viên thấp nhất được phép chỉnh sửa các lượt đặt chỗ khác
$min_booking_admin_level = 2;


// Password policy.  Uncomment the variables and set them to the
// required values as appropriate.
// $pwd_policy['length']  = 6;  // Minimum length
// $pwd_policy['alpha']   = 1;  // Minimum number of alpha characters
// $pwd_policy['lower']   = 1;  // Minimum number of lower case characters
// $pwd_policy['upper']   = 1;  // Minimum number of upper case characters
// $pwd_policy['numeric'] = 1;  // Minimum number of numeric characters
// $pwd_policy['special'] = 1;  // Minimum number of special characters (not alphanumeric)
// Chính sách mật khẩu. Bỏ ghi chú các biến và đặt chúng thành
// các giá trị bắt buộc nếu thích hợp.
// $ pwd_policy ['length'] = 6; // Chiều dài tối thiểu
// $ pwd_policy ['alpha'] = 1; // Số ký tự alpha tối thiểu
// $ pwd_policy ['low'] = 1; // Số ký tự viết thường tối thiểu
// $ pwd_policy ['upper'] = 1; // Số ký tự viết hoa tối thiểu
// $ pwd_policy ['numeric'] = 1; // Số ký tự số tối thiểu
// $ pwd_policy ['special'] = 1; // Số ký tự đặc biệt tối thiểu (không phải chữ và số)
// 'cas' configuration settings
$auth['cas']['host']    = 'cas.example.com';  // Full hostname of your CAS Server
$auth['cas']['port']    = 443;  // CAS server port (integer). Normally for a https server it's 443
$auth['cas']['context'] = '/cas';  // Context of the CAS Server
// The "real" hosts of clustered cas server that send SAML logout messages
// Assumes the cas server is load balanced across multiple hosts.
// Failure to restrict SAML logout requests to authorized hosts could
// allow denial of service attacks where at the least the server is
// tied up parsing bogus XML messages.
//$auth['cas']['real_hosts'] = array('cas-real-1.example.com', 'cas-real-2.example.com');

// For production use set the CA certificate that is the issuer of the certificate
// on the CAS server
$auth['cas']['ca_cert_path'] = '/path/to/cachain.pem';

// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!

// Để kiểm tra nhanh, bạn có thể tắt xác thực SSL của máy chủ CAS.
// CÀI ĐẶT NÀY KHÔNG ĐƯỢC KHUYẾN CÁO ĐỂ SẢN XUẤT.
// XÁC NHẬN MÁY CHỦ CAS LÀ QUAN TRỌNG ĐỐI VỚI BẢO MẬT CỦA GIAO THỨC CAS!
$auth['cas']['no_server_validation'] = false;

// Filtering by attribute
// The next two settings allow you to use CAS attributes to require that a user must have certain
// attributes, otherwise their access level will be zero.  In other words unless they ahave the required
// attributes they will be able to login successfully, but then won't have any more rights than an
// unlogged in user.
// $auth['cas']['filter_attr_name'] = ''; // eg 'department'
// $auth['cas']['filter_attr_values'] = ''; // eg 'DEPT01', or else an array, eg array('DEPT01', 'DEPT02');
// Lọc theo thuộc tính
// Hai cài đặt tiếp theo cho phép bạn sử dụng các thuộc tính CAS để yêu cầu người dùng phải có
// các thuộc tính, nếu không thì cấp độ truy cập của chúng sẽ bằng không. Nói cách khác, trừ khi họ đáp ứng được yêu cầu
// thuộc tính họ sẽ có thể đăng nhập thành công, nhưng sau đó sẽ không có bất kỳ quyền nào khác ngoài một
// người dùng đã mở khóa.
// $ auth ['cas'] ['filter_attr_name'] = ''; // ví dụ: 'bộ phận'
// $ auth ['cas'] ['filter_attr_values'] = ''; // ví dụ: 'DEPT01', hoặc một mảng khác, ví dụ mảng ('DEPT01', 'DEPT02');
$auth['cas']['debug']   = false;  // Set to true to enable debug output. Disable for production.
// Đặt thành true để kích hoạt đầu ra gỡ lỗi. Vô hiệu hóa để sản xuất.


// 'auth_db' configuration settings
// List of fields which only admins can edit.   By default these are the
// user level (ie admin/user) and the username.   Custom fields can be added
// as required.  To protect the password field use 'password_hash' - useful
// for public demo sites.
// cài đặt cấu hình 'auth_db'
// Danh sách các trường mà chỉ quản trị viên mới có thể chỉnh sửa. Theo mặc định, đây là những
// cấp độ người dùng (tức là quản trị viên / người dùng) và tên người dùng. Các trường tùy chỉnh có thể được thêm vào
// theo yêu cầu. Để bảo vệ trường mật khẩu, hãy sử dụng 'password_hash' - hữu ích
// cho các trang demo công khai.
$auth['db']['protected_fields'] = array('level', 'name', 'display_name');
// Expiry time for a password reset key
// Thời gian hết hạn của khóa đặt lại mật khẩu
$auth['db']['reset_key_expiry'] = 60*60*24; // seconds


// 'auth_db_ext' configuration settings
// The 'db_system' variable is equivalent to the core MRBS $dbsys variable,
// and allows you to use any of MRBS's database abstraction layers for
// db_ext authentication.
$auth['db_ext']['db_system'] = 'mysql';
// Hostname of external database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$auth['db_ext']['db_host'] = 'localhost';
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
//$auth['db_ext']['db_port'] = 1234;
$auth['db_ext']['db_username'] = 'authuser';
$auth['db_ext']['db_password'] = 'authpass';
$auth['db_ext']['db_name'] = 'authdb';
$auth['db_ext']['db_table'] = 'users';
$auth['db_ext']['column_name_username'] = 'name';
$auth['db_ext']['column_name_display_name'] = 'display_name';  // optional
$auth['db_ext']['column_name_password'] = 'password';
$auth['db_ext']['column_name_email'] = 'email';
// Below is an example if you want to put the MRBS user level in the DB
//$auth['db_ext']['column_name_level'] = 'mrbs_level';
// Either 'password_hash' (from PHP 5.5.0), 'md5', 'sha1', 'sha256', 'crypt' or 'plaintext'
$auth['db_ext']['password_format'] = 'md5';

// 'auth_ldap' configuration settings

// Many of the LDAP parameters can be specified as arrays, in order to
// specify multiple LDAP directories to search within. Each item below
// will specify whether the item can be specified as an array. If any
// parameter is specified as an array, then EVERY array configuration
// parameter must have the same number of elements. You can specify a
// parameter as an array as in the following example:
//
// $ldap_host = array('localhost', 'otherhost.example.com');

// Where is the LDAP server.   This should ideally consist of a scheme and
// a host, eg "ldap://foo.com" or "ldaps://bar.com", but just a hostname
// is supported for backwards compatibility.
// This can be an array.
//$ldap_host = "localhost";

// If you have a non-standard LDAP port, you can define it here.
// This can be an array.
//$ldap_port = 389;

// If you do not want to use LDAP v3, change the following to false.
// This can be an array.
$ldap_v3 = true;

// If you want to use TLS, change the following to true.
// This can be an array.
$ldap_tls = false;

// Support configuring a TLS client certificate/key from within MRBS.
// Requires PHP 7.1.0 or later
//$ldap_client_cert = 'path-to-cert.crt';
//$ldap_client_key = 'path-to-key.key';

// LDAP base distinguish name.
// This can be an array.
//$ldap_base_dn = "ou=organizationalunit,dc=example,dc=com";

// Attribute within the base dn that contains the username.
// In Microsoft AD directories this is "sAMAccountName".
// This can be an array.
//$ldap_user_attrib = "uid";

// If you need to search the directory to find the user's DN to bind
// with, set the following to the attribute that holds the user's
// "username". In Microsoft AD directories this is "sAMAccountName"
// This can be an array.
//$ldap_dn_search_attrib = "sAMAccountName";

// If you need to bind as a particular user to do the search described
// above, specify the DN and password in the variables below
// These two parameters can be arrays.
// $ldap_dn_search_dn = "cn=Search User,ou=Users,dc=example,dc=com"; // Any compliant LDAP
// $ldap_dn_search_dn = "searchuser@example.com"; // A form which could work for AD LDAP
// $ldap_dn_search_password = "some-password";

// 'auth_ldap' extra configuration for ldap configuration of who can use
// the system
// If it's set, the $ldap_filter will be used to determine whether a
// user will be granted access to MRBS
// This can be an array.
// An example for Microsoft AD:
//$ldap_filter = "memberof=cn=whater,ou=whatver,dc=example,dc=com";

// If you need to filter a user by the group a user is in with an LDAP
// directory which stores group membership in the group object
// (like OpenLDAP) then you need to search for the groups they are
// in. If you want to do this, define the following two variables, an
// an appropriate $ldap_filter. e.g.:
// $ldap_filter_base_dn = "ou=Groups,dc=example,dc=com";
$ldap_filter_user_attr = "memberuid";
// $ldap_filter = "cn=MRBS Users";

// If you need to disable client referrals, this should be set to true.
// Note: Active Directory for Windows 2003 forward requires this.
// $ldap_disable_referrals = true;

// LDAP option for dereferencing aliases
// LDAP_DEREF_NEVER = 0 - (default) aliases are never dereferenced.
// LDAP_DEREF_SEARCHING = 1 - aliases should be dereferenced during the search
//      but not when locating the base object of the search.
// LDAP_DEREF_FINDING = 2 - aliases should be dereferenced when locating the base object but not during the search.
// LDAP_DEREF_ALWAYS = 3 - aliases should be dereferenced always.
//$ldap_deref = LDAP_DEREF_ALWAYS;

// Set to true to tell MRBS to look up a user's email address in LDAP.
// Utilises $ldap_email_attrib below
$ldap_get_user_email = false;
// The LDAP attribute which holds a user's email address
// This can be an array.
$ldap_email_attrib = 'mail';
// The LDAP attribute which holds a user's name. Another common attribute
// to use (with Active Directory) is 'displayname'.
// This can be an array.
$ldap_name_attrib = 'cn';

// The DN of the LDAP group that MRBS admins must be in. If this is defined
// then the $auth["admin"] is not used.
// This can be an array.
// $ldap_admin_group_dn = 'cn=admins,ou=whoever,dc=example,dc=com';

// The LDAP attribute that holds group membership details. Used with
// $ldap_admin_group_dn, above.
// This can be an array.
$ldap_group_member_attrib = 'memberof';

// Set to true if you want MRBS to call ldap_unbind() between successive
// attempts to bind. Unbinding while still connected upsets some
// LDAP servers
$ldap_unbind_between_attempts = false;

// By default MRBS will suppress "invalid credentials" error messages when binding
// in order to avoid the log filling up with warning messages when a user enters
// an incorrect username/password combination.  Set this to FALSE if you want these
// errors to be logged, eg in order to be able spot brute force attack attempts.
$ldap_suppress_invalid_credentials = true;

// Output debugging information for LDAP actions
$ldap_debug = false;

// Output debugging information for LDAP actions and also attribute names and values.
// A higher level of debugging, useful for discovering attribute names.
$ldap_debug_attributes = false;

// 'auth_imap' configuration settings
// See AUTHENTICATION for details of how check against multiple servers
// Where is the IMAP server
$imap_host = "imap-server-name";
// The IMAP server port
$imap_port = "143";

// 'auth_imap_php' configuration settings
$auth["imap_php"]["hostname"] = "localhost";
// You can also specify any of the following options:
// Specifies the port number to connect to
//$auth["imap_php"]["port"] = 993;
// Use SSL
//$auth["imap_php"]["ssl"] = true;
// Use TLS
//$auth["imap_php"]["tls"] = true;
// Turn off SSL/TLS certificate validation
//$auth["imap_php"]["novalidate-cert"] = true;

// Restrict authentication to usernames from a particular domain.  Useful
// when authenticating against a server such as outlook.office365.com which
// supports usernames from many domains.
//$auth['imap_php']['user_domain'] = 'example.com';

// 'auth_pop3' configuration settings
// See AUTHENTICATION for details of how check against multiple servers
// Where is the POP3 server
$pop3_host = "pop3-server-name";
// The POP3 server port
$pop3_port = "110";

// 'auth_smtp' configuration settings
$auth['smtp']['server'] = 'myserver.example.org';


// 'auth_joomla' configuration settings
$auth['joomla']['rel_path'] = '..';   // Path to the Joomla! installation relative to MRBS.
// Be sure to set the cookie path in your Joomla administrator Global Configuration Site settings
// to cover both the Joomla and MRBS installations, eg '/'.

// [Note that although in Joomla! access levels are solely used for what users are allowed to *see*, we use
// them in MRBS to determine what they can see and do, ie we map them onto MRBS user levels.  While this
// does not strictly follow the Joomla! access control model, it does make it much simpler to give users
// MRBS permissions.]

// List of Joomla! viewing access level ids that have MRBS Admin capabilities.  You can if you wish use
// the existing viewing access levels.  However we recommend creating a new access level, eg
// "MRBS Administrator" and assigning that to user groups, as it will then be clearer which groups
// have what kind of access to MRBS.
$auth['joomla']['admin_access_levels'] = array(); // Can either be a single integer, or an array of integers.
// As above, but for ordinary user rights.  Create for example a viewing access level called "MRBS User"
// and assign that level to user groups as appropriate.
$auth['joomla']['user_access_levels'] = array(); // Can either be a single integer, or an array of integers.


// 'auth_saml' configuration settings
// (assuming Active Directory attributes):
$auth['saml']['ssp_path'] = '/opt/simplesamlphp';  // must be an absolute and not a relative path
$auth['saml']['authsource'] = 'default-sp';
$auth['saml']['attr']['username'] = 'sAMAccountName';
$auth['saml']['attr']['mail'] = 'mail';
$auth['saml']['admin']['memberOf'] = ['CN=Domain Admins,CN=Users,DC=example,DC=com'];
// MRBS session initialisation can interfere with session handling in some
// SAML libraries.  If so, set this to true.
$auth['saml']['disable_mrbs_session_init'] = false;

// This scheme assumes that you've already configured SimpleSamlPhp,
// and that you have set up aliases in your webserver so that SimpleSamlPhp
// can handle incoming assertions.  Refer to the SimpleSamlPhp documentation
// for more information on how to do that.
//
// https://simplesamlphp.org/docs/stable/simplesamlphp-install
// https://simplesamlphp.org/docs/stable/simplesamlphp-sp


// 'auth_wordpress' configuration settings
$auth['wordpress']['rel_path'] = '..';   // Path to the WordPress installation relative to MRBS.
// List of WordPress roles that have MRBS Admin capabilities.  The default is 'administrator'.
// Note that these role names are the keys used to store the name, which are typically in lower case
// English, eg 'administrator', and not the values which are displayed on the dashboard form, which will
// generally start with a capital and be translated, eg 'Administrator' or 'Administrateur' (French),
// depending on the site language you have chosen for WordPress.
// You can define more than one WordPress role that maps to the MRBS Admin role by using
// an array.   The comment below assumes that you have created a new WordPress role (probably by using
// a WordPress plugin) called "MRBS Admin", which will typically (depending on the plugin) have a key of
// 'mrbs_admin', and that you assigned that role to those users that you want to be MRBS admins.
$auth['wordpress']['admin_roles'] = 'administrator';  // can also be an array, eg = array('administrator', 'mrbs_admin');
// List of WordPress roles that have MRBS User capabilities.  This allows you to have some WordPress users
// who are authorised to use MRBS and some who are not.
$auth['wordpress']['user_roles'] = array('subscriber', 'contributor', 'author', 'editor', 'administrator');
// List of WordPress roles that are blacklisted.  In other words if a user has a blacklisted role then they
// will be assigned MRBS access level 0, even if they also have a user or admin role.   This feature can be
// useful for disabling MRBS access for certain users by assigning them a WordPress role.
$auth['wordpress']['blacklisted_roles'] = array();

// Note - you are also advised to set the following in your wp-config.php so that the auth
// cookies can be shared between MRBS and WordPress:

/*
// Define cookie paths so that login cookies can be shared with MRBS
$domain_name = 'example.com';  // Set to your domain name
define('COOKIEPATH', '/');
define('SITECOOKIEPATH', '/');
// In the definition below the '.' is necessary for older browsers (see
// http://php.net/manual/en/function.setcookie.php).
define('COOKIE_DOMAIN', ".$domain_name");
define('COOKIEHASH', md5($domain_name));
*/


// General settings

// Allow users just to enter the local-part of their email address (provided that
// the authentication type supports validation by local-part).   For example, if user
// with username 'john' has email address 'jsmith@example.com', then he would be able
// to enter either 'john', 'jsmith' or 'jsmith@example.com' when logging in.
// Only supported for the 'db' authentication type.
// Cài đặt chung

// Cho phép người dùng chỉ cần nhập phần cục bộ của địa chỉ email của họ (miễn là
// kiểu xác thực hỗ trợ xác thực theo phần cục bộ). Ví dụ, nếu người dùng
// với tên người dùng 'john' có địa chỉ email 'jsmith@example.com', thì anh ấy sẽ có thể
// để nhập 'john', 'jsmith' hoặc 'jsmith@example.com' khi đăng nhập.
// Chỉ được hỗ trợ cho kiểu xác thực 'db'
$auth['allow_local_part_email'] = false;

// If you want only administrators to be able to make and delete bookings,
// set this variable to true
// Nếu bạn muốn chỉ quản trị viên mới có thể thực hiện và xóa các lượt đặt trước,
// đặt biến này thành true
$auth['only_admin_can_book'] = false;

// This allows you to set a date (and time) before which only admins can make
// bookings.  This is useful if you want to set a "go live" date and time for MRBS.
// The variable should be set to a valid date/time format as described in
// https://www.php.net/manual/en/datetime.formats.php.   For example set
// $auth['only_admin_can_book_before'] = "2020-12-31 18:00";
// if you want booking to go live at 6pm on 31 Dec 2020.
// Note that $auth['only_admin_can_book_before'] will only be considered if
// $auth['only_admin_can_book'] is false.
$auth['only_admin_can_book_before'] = false;

// If you want only administrators to be able to make repeat bookings,
// set this variable to true
// Nếu bạn chỉ muốn quản trị viên có thể thực hiện đặt trước lặp lại,
// đặt biến này thành true
$auth['only_admin_can_book_repeat'] = false;

// If you want only administrators to be able to make bookings spanning
// more than one day, set this variable to true.
// Nếu bạn muốn chỉ quản trị viên mới có thể thực hiện đặt trước kéo dài
// hơn một ngày, hãy đặt biến này thành true.
$auth['only_admin_can_book_multiday'] = false;

// If you want only administrators to be able to select multiple rooms
// on the booking form then set this to true.  (It doesn't stop ordinary users
// making separate bookings for the same time slot, but it does slow them down).
// Nếu bạn chỉ muốn quản trị viên có thể chọn nhiều phòng
// trên mẫu đặt phòng sau đó đặt giá trị này thành true. (Nó không ngăn cản những người dùng bình thường
// đặt chỗ riêng cho cùng một khoảng thời gian, nhưng nó làm chậm chúng).
$auth['only_admin_can_select_multiroom'] = false;

// Set this to true if you want to restrict the ability to use the "Copy" button on
// the view_entry page to ordinary users viewing their own entries and to admins.
// Đặt giá trị này thành true nếu bạn muốn hạn chế khả năng sử dụng nút "Sao chép" trên
// trang view_entry cho người dùng bình thường xem các mục nhập của chính họ và cho quản trị viên.
$auth['only_admin_can_copy_others_entries'] = false;

// If you don't want ordinary users to be able to see the other users'
// details then set this to true.  (Only relevant when using 'db' authentication]
// Nếu bạn không muốn người dùng bình thường có thể nhìn thấy những người dùng khác '
// chi tiết sau đó đặt giá trị này thành true. (Chỉ có liên quan khi sử dụng xác thực 'db']
$auth['only_admin_can_see_other_users'] = true;

// For events that allow registration, the other registrants' names are by default
// not shown unless you have write access to the booking.
// Đối với các sự kiện cho phép đăng ký, tên của những người đăng ký khác theo mặc định
// không hiển thị trừ khi bạn có quyền ghi vào đặt chỗ.
$auth['show_registrant_names'] = false;

// For events that allow registration you can also show the registrants' names in
// the calendar view, whether or not you have write access to the booking.
// NOTE: you also need $show_registration_level = true; for this to work.
// Đối với các sự kiện cho phép đăng ký, bạn cũng có thể hiển thị tên của những người đăng ký trong
// chế độ xem lịch, cho dù bạn có quyền ghi vào đặt chỗ hay không.
// LƯU Ý: bạn cũng cần $ show_registration_level = true; để điều này hoạt động.
$auth['show_registrant_names_in_calendar'] = false;

// You can additionally choose whether to show the registrants' names in the calendar
// if the calendar is open to the public and the user is not logged in or has level 0 access.
// NOTE: you also need $auth['show_registrant_names_in_calendar'] = true; for this to work

// Ngoài ra, bạn có thể chọn có hiển thị tên người đăng ký trong lịch hay không
// nếu lịch được mở công khai và người dùng chưa đăng nhập hoặc có quyền truy cập cấp 0.
// LƯU Ý: bạn cũng cần $ auth ['show_registrant_names_in_calendar'] = true; để cái này hoạt động
$auth['show_registrant_names_in_public_calendar'] = true;

// Set this to true if you want ordinary users to be able to register others.
// Đặt điều này thành true nếu bạn muốn người dùng bình thường có thể đăng ký người khác.
$auth['users_can_register_others'] = false;

// Set this to true if you don't want admins to be able to make bookings
// on behalf of other users
// Đặt điều này thành true nếu bạn không muốn quản trị viên có thể đặt chỗ
// thay mặt cho những người dùng khác
$auth['admin_can_only_book_for_self'] = false;

// An array of booking types for admin use only
// Một loạt các loại đặt chỗ chỉ dành cho quản trị viên
$auth['admin_only_types'] = array();  // eg array('E');

// If you want to prevent the public (ie un-logged in users) from
// being able to view bookings completely, set this variable to true
// Nếu bạn muốn ngăn công chúng (tức là người dùng chưa đăng nhập) khỏi
// có thể xem toàn bộ lượt đặt chỗ, hãy đặt biến này thành true
$auth['deny_public_access'] = false;

// Or else you can allow them to see that there is a booking, but the
// details will be shown as private if you set this to true.
// Hoặc nếu không, bạn có thể cho phép họ thấy rằng có một lượt đặt chỗ, nhưng
// chi tiết sẽ được hiển thị là riêng tư nếu bạn đặt điều này thành true.
$auth['force_private_for_guests'] = false;

// Set to true if you want admins to be able to perform bulk deletions
// on the Report page.  (It also only shows up if JavaScript is enabled)

// Đặt thành true nếu bạn muốn quản trị viên có thể thực hiện xóa hàng loạt
// trên trang Báo cáo. (Nó cũng chỉ hiển thị nếu JavaScript được bật)
$auth['show_bulk_delete'] = false;

// Allow admins to insert custom HTML on the area and room pages.  This can be useful for
// displaying information about an area or room, eg with a picture or a map.   But it
// also presents a security risk as the HTML is output as is, and could therefore contain
// malicious scripts.   Only set $auth['allow_custom_html'] to true if you trust your admins.
$auth['allow_custom_html'] = false;

// Set to true if you want to allow MRBS to be run from the command line, for example
// if you want to produce reports from a cron job.   (It is set to false by default
// as a security measure, because when running from the CLI you are assumed to have
// full admin access).
$allow_cli = false;

// Set to true if you want usernames and passwords submitted in the login form to be
// recorded in the error log as part of the $_POST variable.  Otherwise they are
// replaced by '****', unless they are the empty string ''.
// Đặt thành true nếu bạn muốn tên người dùng và mật khẩu được gửi trong biểu mẫu đăng nhập là
// được ghi lại trong nhật ký lỗi như một phần của biến $ _POST. Nếu không thì họ là
// được thay thế bằng '****', trừ khi chúng là chuỗi rỗng ''.
$auth['log_credentials'] = false;


/**********************************************
 * Email settings
 **********************************************/

// BASIC SETTINGS
// --------------

// Set the email address of the From field. Default is 'admin_email@your.org'
// Đặt địa chỉ email của trường Từ. Mặc định là 'admin_email@your.org'
// $mail_settings['from'] = 'it@nhuatienphong.vn';
$mail_settings['from'] = '';

// By default MRBS will send some emails (eg booking approval emails) as though they have come from
// the user, rather than the From address above.   However some email servers will not allow this in
// order to prevent email spoofing.   If this is the case then set this to true in order that the
// From address above is used for all emails.
// Theo mặc định, MRBS sẽ gửi một số email (ví dụ: email phê duyệt đặt phòng) như thể chúng đến từ
// người dùng, thay vì địa chỉ Từ ở trên. Tuy nhiên, một số máy chủ email sẽ không cho phép điều này trong
// để ngăn chặn việc giả mạo email. Nếu đúng như vậy thì hãy đặt điều này thành true để
// Địa chỉ từ ở trên được sử dụng cho tất cả các email.
$mail_settings['use_from_for_all_mail'] = false;

// The address to be used for the ORGANIZER in an iCalendar event.   Do not make
// this email address the same as the admin email address or the recipients
// email address because on some mail systems, eg IBM Domino, the iCalendar email
// notification is silently discarded if the organizer's email address is the same
// as the recipient's.  On other systems you may get a "Meeting not found" message.
// Địa chỉ được sử dụng cho ORGANIZER trong sự kiện iCalendar. Đừng làm
// địa chỉ email này giống với địa chỉ email quản trị hoặc người nhận
// địa chỉ email vì trên một số hệ thống thư, ví dụ: IBM Domino, email iCalendar
// thông báo bị hủy âm thầm nếu địa chỉ email của người tổ chức giống nhau
// với tư cách là của người nhận. Trên các hệ thống khác, bạn có thể nhận được thông báo "Không tìm thấy cuộc họp".
$mail_settings['organizer'] = '';

// Set the recipient email. Default is 'admin_email@your.org'. You can define
// more than one recipient like this "john@doe.com,scott@tiger.com"
// Đặt email người nhận. Mặc định là 'admin_email@your.org'. Bạn có thể xác định
// nhiều người nhận như thế này "john @ doe.com, scott @ tiger.com"
$mail_settings['recipients'] = '';

// Set email address of the Carbon Copy field. Default is ''. You can define
// more than one recipient (see 'recipients')
// Đặt địa chỉ email của trường Carbon Copy. Mặc định là ''. Bạn có thể xác định
// nhiều hơn một người nhận (xem 'người nhận')
$mail_settings['cc'] = '';

// Set to true if you want the cc addresses to be appended to the to line.
// (Some email servers are configured not to send emails if the cc or bcc
// fields are set)
// Đặt thành true nếu bạn muốn các địa chỉ cc được nối vào dòng tới.
// (Một số máy chủ email được định cấu hình để không gửi email nếu cc hoặc bcc
// các trường được thiết lập)
$mail_settings['treat_cc_as_to'] = false;



// WHO TO EMAIL
// ------------
// The following settings determine who should be emailed when a booking is made,
// edited or deleted (though the latter two events depend on the "When" settings below).
// Set to true or false as required
// (Note:  the email addresses for the area and room administrators are set from the
// edit_area.php and edit_room.php pages in MRBS)
// NGƯỜI GỬI EMAIL
// ------------
// Các cài đặt sau xác định ai sẽ được gửi email khi đặt phòng,
// đã chỉnh sửa hoặc xóa (mặc dù hai sự kiện sau phụ thuộc vào cài đặt "Khi nào" bên dưới).
// Đặt thành true hoặc false theo yêu cầu
// (Lưu ý: địa chỉ email cho quản trị viên khu vực và phòng được đặt từ
// các trang edit_area.php và edit_room.php trong MRBS)
$mail_settings['admin_on_bookings']      = false;  // the addresses defined by $mail_settings['recipients'] below
$mail_settings['area_admin_on_bookings'] = false;  // the area administrator
$mail_settings['room_admin_on_bookings'] = false;  // the room administrator
$mail_settings['booker']                 = false;  // the person making the booking
$mail_settings['book_admin_on_approval'] = false;  // the booking administrator when booking approval is enabled
                                                   // (which is the MRBS admin, but this setting allows MRBS
                                                   // to be extended to have separate booking approvers)

// WHEN TO EMAIL
// -------------
// These settings determine when an email should be sent.
// Set to true or false as required
//
// (Note:  (a) the variables $mail_settings['admin_on_delete'] and
// $mail_settings['admin_all'], which were used in MRBS versions 1.4.5 and
// before are now deprecated.   They are still supported for reasons of backward
// compatibility, but they may be withdrawn in the future.  (b)  the default
// value of $mail_settings['on_new'] is true for compatibility with MRBS 1.4.5
// and before, where there was no explicit config setting, but mails were always sent
// for new bookings if there was somebody to send them to)

// KHI NÀO GỬI EMAIL
// -------------
// Các cài đặt này xác định thời điểm gửi email.
// Đặt thành true hoặc false theo yêu cầu
//
// (Lưu ý: (a) các biến $ mail_settings ['admin_on_delete'] và
// $ mail_settings ['admin_all'], được sử dụng trong MRBS phiên bản 1.4.5 và
// trước đây không được dùng nữa. Họ vẫn được hỗ trợ vì lý do lạc hậu
// khả năng tương thích, nhưng chúng có thể bị rút lại trong tương lai. (b) mặc định
// giá trị của $ mail_settings ['on_new'] là đúng để tương thích với MRBS 1.4.5
// và trước đây, nơi không có cài đặt cấu hình rõ ràng, nhưng thư luôn được gửi
// cho các đặt chỗ mới nếu có ai đó gửi chúng đến)

$mail_settings['on_new']    = false;   // when an entry is created
$mail_settings['on_change'] = false;  // when an entry is changed
$mail_settings['on_delete'] = false;  // when an entry is deleted

// It is also possible to allow all users or just admins to choose not to send an
// email when creating or editing a booking.  This can be useful if an inconsequential
// change is being made, or many bookings are being made at the beginning of a term or season.
// Cũng có thể cho phép tất cả người dùng hoặc chỉ quản trị viên chọn không gửi
// gửi email khi tạo hoặc chỉnh sửa đặt chỗ. Điều này có thể hữu ích nếu một
// thay đổi đang được thực hiện hoặc nhiều lượt đặt trước đang được thực hiện vào đầu kỳ hạn hoặc mùa giải.
$mail_settings['allow_no_mail']        = false;
$mail_settings['allow_admins_no_mail'] = false;  // Ignored if 'allow_no_mail' is true
$mail_settings['no_mail_default'] = false; // Default value for the 'no mail' checkbox.
                                           // true for checked (ie don't send mail),
                                           // false for unchecked (ie do send mail)


// WHAT TO EMAIL
// -------------
// These settings determine what should be included in the email
// Set to true or false as required

// GÌ ĐỂ GỬI EMAIL
// -------------
// Các cài đặt này xác định những gì nên được đưa vào email
// Đặt thành true hoặc false theo yêu cầu
$mail_settings['details']   = true; // Set to true if you want full booking details;
                                     // otherwise you just get a link to the entry
$mail_settings['html']      = true; // Set to true if you want HTML mail
$mail_settings['icalendar'] = true; // Set to true to include iCalendar details
                                     // which can be imported into a calendar.  (Note:
                                     // iCalendar details will not be sent for areas
                                     // that use periods as there isn't a mapping between
                                     // periods and time of day, so the calendar would not
                                     // be able to import the booking)

// HOW TO EMAIL - LANGUAGE
// -----------------------------------------

// Set the language used for emails (choose an available lang.* file).
// Đặt ngôn ngữ được sử dụng cho email (chọn một tệp lang. * Có sẵn).
$mail_settings['admin_lang'] = 'vi';   // Default is 'en'.


// HOW TO EMAIL - ADDRESSES
// ------------------------
// The email addresses of the MRBS administrator are set in the config file, and those of
// the room and area administrators are set though the edit_area.php and edit_room.php
// pages in MRBS.  But if you have set $mail_settings['booker'] above to true, MRBS will
// need the email addresses of ordinary users.   If you are using the "db"
// authentication method then MRBS will be able to get them from the users table.  But
// if you are using any other authentication scheme then the following settings allow
// you to specify a domain name that will be appended to the username to produce a
// valid email address (eg "@domain.com").  MRBS will add the '@' character for you.

// CÁCH GỬI EMAIL - ĐỊA CHỈ
// ------------------------
// Địa chỉ email của quản trị viên MRBS được đặt trong tệp cấu hình và địa chỉ của
// quản trị viên phòng và khu vực được thiết lập thông qua edit_area.php và edit_room.php
// các trang trong MRBS. Nhưng nếu bạn đã đặt $ mail_settings ['booker'] ở trên thành true, MRBS sẽ
// cần địa chỉ email của người dùng bình thường. Nếu bạn đang sử dụng "db"
// phương thức xác thực thì MRBS sẽ có thể lấy chúng từ bảng người dùng. Nhưng mà
// nếu bạn đang sử dụng bất kỳ lược đồ xác thực nào khác thì các cài đặt sau cho phép
// bạn chỉ định một tên miền sẽ được thêm vào tên người dùng để tạo ra một
// địa chỉ email hợp lệ (ví dụ: "@ domain.com"). MRBS sẽ thêm ký tự '@' cho bạn.
$mail_settings['domain'] = '';
// If you use $mail_settings['domain'] above and the username returned by mrbs contains extra
// strings appended like the domain name ('username.domain'), you need to provide
// this extra string here so that it will be removed from the username.

// Nếu bạn sử dụng $ mail_settings ['domain'] ở trên và tên người dùng do mrbs trả về có chứa thêm
// các chuỗi được thêm vào như tên miền ('username.domain'), bạn cần cung cấp
// chuỗi bổ sung này ở đây để nó sẽ bị xóa khỏi tên người dùng.
$mail_settings['username_suffix'] = '';


// HOW TO EMAIL - BACKEND
// ----------------------
// Set the name of the backend used to transport your mails. Either 'mail',
// 'smtp', 'sendmail' or 'qmail'. Default is 'mail'.
// CÁCH GỬI EMAIL - QUAY LẠI
// ----------------------
// Đặt tên của chương trình phụ trợ được sử dụng để vận chuyển các thư của bạn. 'Thư',
// 'smtp', 'sendmail' hoặc 'qmail'. Mặc định là 'thư'.
$mail_settings['admin_backend'] = 'smtp';

/*******************
 * Sendmail settings
 */

// Set the path of the Sendmail program (only used with "sendmail" backend).
// Default is '/usr/bin/sendmail'
$sendmail_settings['path'] = '/usr/bin/sendmail';
// Set additional Sendmail parameters (only used with "sendmail" backend).
// (example "-t -i"). Default is ''
$sendmail_settings['args'] = '';

/*******************
 * Qmail settings
 */

/* Configures the path to 'qmail-inject', if unset defaults to '/var/qmail/bin/qmail-inject' */
$mail_settings['qmail']['qmail-inject-path'] = '/usr/bin/qmail-inject';

/*******************
 * SMTP settings
 */

// These settings are only used with the "smtp" backend
$smtp_settings['host'] = 'smtp.gmail.com';  // SMTP server
$smtp_settings['port'] = 465;           // SMTP port number
$smtp_settings['auth'] = true;        // Whether to use SMTP authentication
$smtp_settings['secure'] = 'ssl';         // Encryption method: '', 'tls' or 'ssl' - note that 'tls' means TLS is used even if the SMTP
                                       // server doesn't advertise it. Conversely if you specify '' and the server advertises TLS, TLS
                                       // will be used, unless the 'disable_opportunistic_tls' configuration parameter shown below is
                                       // set to true.
$smtp_settings['username'] = '';       // Username (if using authentication)
$smtp_settings['password'] = 'sbmpydmyfsarlwxr';       // Password (if using authentication)

// The hostname to use in the Message-ID header and as default HELO string.
// If empty, PHPMailer attempts to find one with, in order,
// $_SERVER['SERVER_NAME'], gethostname(), php_uname('n'), or the value
// 'localhost.localdomain'.
$smtp_settings['hostname'] = 'smtp.gmail.com';

// The SMTP HELO/EHLO name used for the SMTP connection.
// Default is $smtp_settings['hostname']. If $smtp_settings['hostname'] is empty, PHPMailer attempts to find
// one with the same method described above for $smtp_settings['hostname'].
$smtp_settings['helo'] = '';

$smtp_settings['disable_opportunistic_tls'] = false; // Set this to true to disable
                                                     // opportunistic TLS
                                                     // https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#opportunistic-tls
// If you're having problems with sending email to a TLS-enabled SMTP server *which you trust* you can change the following
// settings, which reduce TLS security.
// See https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#php-56-certificate-verification-failure
$smtp_settings['ssl_verify_peer'] = true;
$smtp_settings['ssl_verify_peer_name'] = true;
$smtp_settings['ssl_allow_self_signed'] = false;

// EMAIL - MISCELLANEOUS
// ---------------------

// The filename to be used for iCalendar attachments.   Will always have the
// extension '.ics'
$mail_settings['ics_filename'] = "booking";

// The rate at which emails can be sent out can be throttled if necessary in order to help
// keep within a mail server's limits.  Note that the throttle only applies to emails being
// sent by one user.  If another user is generating email notifications at the same time
// then these won't be taken into account.   Note also that if the email is going to n
// different addresses then this counts as n emails, as that is how most servers operate.
// A setting of zero disables throttling.

// Có thể điều chỉnh tốc độ gửi email đi nếu cần để trợ giúp
// giữ trong giới hạn của máy chủ thư. Lưu ý rằng điều chỉnh chỉ áp dụng cho các email được
// do một người dùng gửi. Nếu người dùng khác đang tạo thông báo qua email cùng một lúc
// thì chúng sẽ không được tính đến. Cũng lưu ý rằng nếu email được chuyển đến n
// các địa chỉ khác nhau thì điều này được tính là n email, vì đó là cách hầu hết các máy chủ hoạt động.
// Cài đặt bằng 0 vô hiệu hóa điều chỉnh.
$mail_settings['rate_limit'] = 0;  // emails per second (float or int)

// Set this to true if you want MRBS to output debug information when you are sending email.
// If you are not getting emails it can be helpful by telling you (a) whether the mail functions
// are being called in the first place (b) whether there are addresses to send email to and (c)
// the result of the mail sending operation.
// Đặt điều này thành true nếu bạn muốn MRBS xuất ra thông tin gỡ lỗi khi bạn đang gửi email.
// Nếu bạn không nhận được email, có thể hữu ích bằng cách cho bạn biết (a) liệu các chức năng của thư
// đang được gọi ở vị trí đầu tiên (b) cho dù có địa chỉ nào để gửi email đến và (c)
// kết quả của thao tác gửi mail.
$mail_settings['debug'] = false;
// Where to send the debug output.  Can be 'browser' or 'log' (for the error_log)
$mail_settings['debug_output'] = 'log';

// Set this to true if you do not want any email sent, whatever the rest of the settings.
// This is a global setting that will override anything else.   Useful when testing MRBS.

// Đặt điều này thành true nếu bạn không muốn gửi bất kỳ email nào, bất kể phần còn lại của cài đặt.
// Đây là cài đặt chung sẽ ghi đè lên bất kỳ thứ gì khác. Hữu ích khi kiểm tra MRBS.
$mail_settings['disabled'] = false;


/**********
 * Language
 **********/

// Set this to true to disable the automatic language changing MRBS performs
// based on the user's browser language settings. It will ensure that
// the language displayed is always the value of $default_language_tokens,
// as specified below

// Đặt giá trị này thành true để tắt tính năng tự động thay đổi ngôn ngữ mà MRBS thực hiện
// dựa trên cài đặt ngôn ngữ trình duyệt của người dùng. Nó sẽ đảm bảo rằng
// ngôn ngữ được hiển thị luôn là giá trị của $ default_language_tokens,
// như được chỉ định bên dưới
$disable_automatic_language_changing = true;

// Set this to a different language specifier to default to different
// language tokens. This must equate to a lang.* file in MRBS.
// e.g. use "fr" to use the translations in "lang.fr" as the default
// translations.  [NOTE: it is only necessary to change this if you
// have disabled automatic language changing above]
// Đặt điều này thành một định nghĩa ngôn ngữ khác để mặc định thành khác
// mã thông báo ngôn ngữ. Điều này phải tương đương với tệp lang. * Trong MRBS.
// ví dụ. sử dụng "fr" để sử dụng các bản dịch trong "lang.fr" làm mặc định
// bản dịch. [LƯU Ý: chỉ cần thay đổi điều này nếu bạn
// đã tắt tính năng tự động thay đổi ngôn ngữ ở trên]
$default_language_tokens = "vi";

// Set this to a valid locale that is supported on the OS you run the
// MRBS server on if you want to override the automatic locale determination
// MRBS performs.  The locale should be in the form of a BCP 47 language
// tag, eg 'en-GB', or 'sr-Latn-RS'.   Note that MRBS will convert this into
// a format suitable for your OS, eg by adding '.utf-8' or changing it to 'eng'.

// Đặt điều này thành ngôn ngữ hợp lệ được hỗ trợ trên hệ điều hành bạn chạy
// Bật máy chủ MRBS nếu bạn muốn ghi đè xác định ngôn ngữ tự động
// MRBS thực hiện. Ngôn ngữ phải ở dạng ngôn ngữ BCP 47
// thẻ, ví dụ: 'en-GB' hoặc 'sr-Latn-RS'. Lưu ý rằng MRBS sẽ chuyển đổi điều này thành
// định dạng phù hợp với hệ điều hành của bạn, ví dụ: bằng cách thêm '.utf-8' hoặc thay đổi nó thành 'eng'.
$override_locale = "vi";

// faq file language selection. IF not set, use the default english file.
// IF your language faq file is available, set $faqfilelang to match the
// end of the file name, including the underscore (ie. for site_faq_fr.html
// use "_fr"
// lựa chọn ngôn ngữ tệp faq. NẾU không được đặt, hãy sử dụng tệp tiếng anh mặc định.
// NẾU tệp câu hỏi thường gặp về ngôn ngữ của bạn có sẵn, hãy đặt $ faqfilelang để khớp với
// phần cuối của tên tệp, bao gồm cả dấu gạch dưới (ví dụ: cho site_faq_fr.html
// sử dụng "_fr"
$faqfilelang = "";

// Language selection when run from the command line
// Lựa chọn ngôn ngữ khi chạy từ dòng lệnh
$cli_language = "vi";

// Set to true to get debug information on languages and locales written to the
// error log.
// Đặt thành true để nhận thông tin gỡ lỗi về ngôn ngữ và địa phương được ghi vào
// nhật ký lỗi.
$language_debug = false;

// Vocab overrides
// ---------------

// You can override the text strings that appear in the lang.* files by setting
// $vocab_override[LANG][TOKEN] in your config file, where LANG is the language,
// for example 'en' and TOKEN is the key of the $vocab array.  For example to
// alter the string "Meeting Room Booking System" in English set
//
// $vocab_override['en']['mrbs'] = "My Resource Booking System";
//
// Applying vocab overrides in the config file rather than editing the lang files
// mean that your changes will be preserved when you upgrade to the next version of
// MRBS and you won't have to re-edit the lang file.
// Bạn có thể ghi đè các chuỗi văn bản xuất hiện trong tệp lang. * Bằng cách cài đặt
// $ vocab_override [LANG] [TOKEN] trong tệp cấu hình của bạn, trong đó LANG là ngôn ngữ,
// ví dụ 'en' và TOKEN là khóa của mảng $ vocab. Ví dụ để
// thay đổi chuỗi "Hệ thống đặt phòng họp" bằng tiếng Anh
//
// $ vocab_override ['en'] ['mrbs'] = "Hệ thống đặt trước tài nguyên của tôi";
//
// Áp dụng ghi đè vocab trong tệp cấu hình thay vì chỉnh sửa tệp lang
// nghĩa là các thay đổi của bạn sẽ được giữ nguyên khi bạn nâng cấp lên phiên bản tiếp theo của
// MRBS và bạn sẽ không phải chỉnh sửa lại tệp lang.

/*************
 * Reports
 *************/

// Default file names
$report_filename  = "report";
$summary_filename = "summary";

// CSV format
// By default Excel expects a tab as the column separator, so if you are opening
// CSV files with Excel you may want to change $csv_col_sep to be "\t" (note that
// the double quotes are important to ensure this is interpreted as a tab character).
$csv_row_sep = "\n";  // Separator between rows/records
$csv_col_sep = ",";   // Separator between columns/fields

// CSV charset
// Set the character set to be used for CSV files.   If $csv_charset is not set
// then CSV files are written using the MRBS default charset (utf-8).
// Earlier versions of Microsoft Excel (at least up to Excel 2010 on Windows and 2011
// on Mac) are not guaranteed to recognise utf-8, but do recognise utf-16, so for those
// versions try setting $csv_charset to 'utf-16' and $csv_bom to true.
$csv_charset = 'utf-8';
$csv_bom = false;


/*************
 * iCalendar
 *************/

// The default delimiter for separating the area and room in the LOCATION property
// of an iCalendar event.   Note that no escaping of the delimiter is provided so
// it must not occur in room or area names.
// Dấu phân cách mặc định để phân tách khu vực và phòng trong thuộc tính LOCATION
// sự kiện iCalendar. Lưu ý rằng không có dấu phân cách thoát được cung cấp như vậy
// nó không được xuất hiện trong tên phòng hoặc khu vực.
$default_area_room_delimiter = '/';

// Set the default source type for imports.  Can be 'file' or 'url'
// Đặt kiểu nguồn mặc định cho các lần nhập. Có thể là 'tệp' hoặc 'url'
$default_import_source = 'file';

// Default setting for importing past events
// Cài đặt mặc định để nhập các sự kiện trước đây
$default_import_past = true;


/*************
 * Entry Types
 *************/

// This array lists the configured entry type codes. The values map to a
// single char in the MRBS database, and so can be any permitted PHP array
// character.
//
// The default descriptions of the entry types are held in the language files
// as "type.X" where 'X' is the entry type.  If you want to change the description
// you can override the default descriptions by setting the $vocab_override config
// variable.   For example, if you add a new booking type 'C' the minimum you need
// to do is add a line to config.inc.php like:
//
// $vocab_override["en"]["type.C"] =     "New booking type";
//
// Below is a basic default array which ensures there are at least some types defined.
// The proper type definitions should be made in config.inc.php.
//
// Each type has a color which is defined in the array $color_types in the styling.inc
// file in the Themes directory

// Mảng này liệt kê các mã loại mục nhập đã định cấu hình. Các giá trị ánh xạ tới một
// ký tự đơn trong cơ sở dữ liệu MRBS và vì vậy có thể là bất kỳ mảng PHP nào được phép
// tính cách.
//
// Các mô tả mặc định của các loại mục nhập được giữ trong các tệp ngôn ngữ
// là "type.X" trong đó 'X' là loại mục nhập. Nếu bạn muốn thay đổi mô tả
// bạn có thể ghi đè các mô tả mặc định bằng cách đặt cấu hình $ vocab_override
// Biến đổi. Ví dụ: nếu bạn thêm một loại đặt chỗ mới 'C', mức tối thiểu bạn cần
// việc cần làm là thêm một dòng vào config.inc.php như:
//
// $ vocab_override ["en"] ["type.C"] = "Loại đặt chỗ mới";
//
// Dưới đây là một mảng mặc định cơ bản đảm bảo có ít nhất một số kiểu được xác định.
// Định nghĩa kiểu thích hợp nên được tạo trong config.inc.php.
//
// Mỗi kiểu có một màu được xác định trong mảng $ color_types trong styles.inc
// tệp trong thư mục Chủ đề
unset($booking_types);    // Include this line when copying to config.inc.php
$booking_types[] = "E";
$booking_types[] = "I";

// If you don't want to use types then uncomment the following line.  (The booking will
// still have a type associated with it in the database, which will be the default type.)
// unset($booking_types);

// Default brief description for new bookings
$default_name = "";

// Set this to true if you want the booking name (brief description) to
// default to the current user's display name.  If set, this setting overrides
// $default_name.
$default_name_display_name = false;

// Default long description for new bookings
$default_description = "";

// Only required if your MRBS installation runs from a Git repository
// and you want the "Help" page to show the Git commit ID you are on. Default
// should work if "git" is in your search path, on Windows you may need to specify the
// full path to your "git" executable, e.g.:
// "c:/Program Files/TortoiseGit/git.exe"
$git_command = "git";
