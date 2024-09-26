<?php // -*-mode: PHP; coding:utf-8;-*-
namespace MRBS;

use IntlDateFormatter;

require_once 'lib/autoload.inc';

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

/***************************************************************************
 * Tệp cấu hình MRBS
 * Cấu hình tệp này cho trang web của bạn.
 * Bạn không cần phải sửa đổi bất kỳ thứ gì bên ngoài tệp này.
 *
 * Tệp này đã được điền sẵn bộ cấu hình tối thiểu
 * mà bạn cần thay đổi để hệ thống của bạn hoạt động.
 * Nếu bạn muốn thay đổi bất kỳ cài đặt nào khác trong systemdefaults.inc.php
 * hoặc areadefaults.inc.php, hãy sao chép các dòng có liên quan vào tệp này
 * và chỉnh sửa chúng tại đây. Tệp này sẽ ghi đè cài đặt mặc định và
 * khi bạn nâng cấp lên phiên bản MRBS mới, tệp cấu hình sẽ được giữ nguyên.
 *
 * LƯU Ý: nếu bạn bao gồm hoặc yêu cầu các tệp khác từ tệp này, ví dụ
 * để lưu trữ thông tin chi tiết về cơ sở dữ liệu của bạn ở một vị trí riêng biệt, thì bạn nên
 * sử dụng tên đường dẫn tuyệt đối chứ không phải tương đối.
 *************************************************************************/

/*********
 * Múi giờ
 **********/

// Múi giờ mà phòng họp của bạn chạy. Điều này đặc biệt quan trọng
// nếu bạn đang sử dụng PHP 5 trên Linux. Trong cấu hình này
// nếu bạn không làm vậy, các cuộc họp ở DST khác với DST hiện tại của bạn
// sẽ bị bù trừ bởi độ lệch DST không chính xác.
//
// Lưu ý rằng múi giờ có thể được đặt trên cơ sở từng khu vực, vì vậy nói một cách chính xác thì
// cài đặt này phải nằm trong areadefaults.inc.php, nhưng vì việc đặt
// đúng múi giờ là rất quan trọng nên nó được bao gồm ở đây.
//
// Khi nâng cấp cài đặt hiện có, cài đặt này phải được đặt thành
// múi giờ mà máy chủ web chạy. Xem tài liệu CÀI ĐẶT để biết thêm thông tin.
//
// Danh sách các múi giờ hợp lệ có thể được tìm thấy tại http://php.net/manual/timezones.php
// Dòng sau phải được bỏ chú thích bằng cách xóa '//' ở đầu
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

// Tên lược đồ. Điều này chỉ áp dụng cho PostgreSQL và chỉ cần thiết nếu bạn có nhiều
// hơn một lược đồ trong cơ sở dữ liệu của mình và bạn cũng đang sử dụng cùng tên bảng MRBS trong
// nhiều lược đồ.
//$db_schema = "public";
// Tên người dùng đăng nhập cơ sở dữ liệu:
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

// Đặt $db_persist thành TRUE để sử dụng kết nối cơ sở dữ liệu liên tục (gộp) PHP. Lưu ý
// rằng kết nối liên tục không được khuyến khích trừ khi hệ thống của bạn gặp phải các vấn đề đáng kể về hiệu suất
// khi không có chúng. Chúng có thể gây ra sự cố với các giao dịch và
// khóa (xem http://php.net/manual/en/features.persistent-connections.php) và mặc dù
// MRBS cố gắng tránh những sự cố đó, nhưng nhìn chung tốt hơn là không nên sử dụng kết nối liên tục
// nếu bạn có thể.
$db_persist = false;


/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */

$default_language_tokens = "vi";

/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */
// The company logo, additional information and URL are all optional.
$mrbs_company_logo = "https://dichvuvpct.nhuatienphong.vn/image/logo2.png";
$mrbs_company = "CÔNG TY CỔ PHẦN NHỰA THIẾU NIÊN TIỀN PHONG";   // This line must always be uncommented ($mrbs_company is used in various places)
// $mrbs_company_url = "https://nhuatienphong.vn/";

// $theme = "classic126";


// Set this to true if you want to prevent users editing or deleting approved bookings.
// Note that this setting only applies if booking approval is in force for the area.
// If it isn't in force you can prevent bookings being edited or deleted by using the
// min and max delete ahead settings.
// Đặt thành true nếu bạn muốn ngăn người dùng chỉnh sửa hoặc xóa các đặt phòng đã được chấp thuận.
// Lưu ý rằng cài đặt này chỉ áp dụng nếu phê duyệt đặt phòng có hiệu lực đối với khu vực.
// Nếu không có hiệu lực, bạn có thể ngăn các đặt phòng bị chỉnh sửa hoặc xóa bằng cách sử dụng
// cài đặt xóa trước tối thiểu và tối đa.
$approved_bookings_cannot_be_changed = false;

// Set this to true if you want to prevent users having a booking for multiple rooms
// at the same time.
// Đặt thành true nếu bạn muốn ngăn người dùng đặt nhiều phòng
// cùng một lúc.
// The maximum number of simultaneous bookings allowed if $prevent_simultaneous_bookings is true.
// Số lượng đặt chỗ đồng thời tối đa được phép nếu $prevent_simultaneous_bookings là đúng.
$prevent_simultaneous_bookings = false;
$max_simultaneous_bookings = 1;

/******************
 * Display settings
 ******************/

// [These are all variables that control the appearance of pages and could in time
//  become per-user settings]

// Start of week: 0 for Sunday, 1 for Monday, etc.
/******************
 * Cài đặt hiển thị
 ******************/

// [Đây là tất cả các biến kiểm soát giao diện của các trang và theo thời gian có thể
// trở thành cài đặt cho từng người dùng]

// Bắt đầu tuần: 0 cho Chủ Nhật, 1 cho Thứ Hai, v.v.
$weekstarts = 0;
// Days of the week that are weekdays
// Những ngày là ngày trong tuần
$weekdays = array(1, 2, 3, 4, 5);
// Set this to true to add styling to weekend days
// Đặt thành true để thêm kiểu dáng cho các ngày cuối tuần
$style_weekends = false;

// Define default starting view (month, week or day)
// Default is day
// Xác định chế độ xem bắt đầu mặc định (tháng, tuần hoặc ngày)
// Mặc định là ngày
$default_view = "day";


// Define clipping behaviour for the cells in the month view.
// Set to true if you want all entries to have the same height. The
// short description may be clipped in this case. If set to false,
// each booking entry will be large enough to display all information.
// Xác định hành vi cắt cho các ô trong chế độ xem tháng.
// Đặt thành true nếu bạn muốn tất cả các mục có cùng chiều cao.
// mô tả ngắn có thể bị cắt trong trường hợp này. Nếu đặt thành false,
// mỗi mục đặt phòng sẽ đủ lớn để hiển thị tất cả thông tin.
$clipped_month = false;

// Set to true if you want the cells in the month view to scroll if there are too
// many bookings to display; set to false if you want the table cell to expand to
// accommodate the bookings.
// Đặt thành true nếu bạn muốn các ô trong chế độ xem tháng cuộn nếu có quá
// nhiều đặt phòng để hiển thị; đặt thành false nếu bạn muốn ô trong bảng mở rộng để
// chứa các đặt phòng.
$month_cell_scrolling = true;

// The default orientation for Excel output
// Options: 'portrait' or 'landscape'
// Hướng mặc định cho đầu ra Excel
// Tùy chọn: 'portrait' hoặc 'landscape'
$excel_default_orientation = 'portrait';

// Đặt thành false nếu bạn không muốn có khả năng tạo các sự kiện mà
// người khác có thể đăng ký.
$enable_registration = false;

// If you don't want ordinary users to be able to see the other users'
// details then set this to true.  Used by the 'db' authentication scheme to determine
// whether to show other users to non-admins, and also generally to determine whether
// to create mailto: links, eg when viewing booking details.
// Nếu bạn không muốn người dùng thông thường có thể xem thông tin chi tiết của người dùng khác
// thì hãy đặt thành true. Được sử dụng bởi lược đồ xác thực 'db' để xác định
// có nên hiển thị người dùng khác cho những người không phải quản trị viên hay không và nói chung cũng để xác định xem
// có nên tạo liên kết mailto: hay không, ví dụ khi xem thông tin chi tiết về đặt phòng.
$auth['only_admin_can_see_other_users'] = true;

// Set this to true if you don't want admins to be able to make bookings
// on behalf of other users
// Đặt thành true nếu bạn không muốn người quản trị có thể thực hiện đặt chỗ
// thay mặt cho người dùng khác
$auth['admin_can_only_book_for_self'] = false;

// If you want to prevent the public (ie un-logged in users) from
// being able to view bookings completely, set this variable to true
// Nếu bạn muốn ngăn chặn công chúng (tức là người dùng chưa đăng nhập)
// có thể xem toàn bộ các lần đặt chỗ, hãy đặt biến này thành true
$auth['deny_public_access'] = false;
// Or else you can allow them to see that there is a booking, but the
// details will be shown as private if you set this to true.
// Hoặc bạn có thể cho phép họ thấy rằng có một lần đặt phòng, nhưng
// thông tin chi tiết sẽ được hiển thị ở chế độ riêng tư nếu bạn đặt thành đúng.
$auth['force_private_for_guests'] = false;

$booking_types[] = "A";
$vocab_override["en"]["type.A"] = "Thấp";

$select_options['entry.name'] = array(
   'NCPT' => 'Nghiên cứu phát triển',
   'CNCL' => 'Công nghệ chất lượng',
   'DVKH' => 'Dịch vụ khách hàng',
   'KTNB' => 'Kiểm Toán Nội Bộ',
   'MKT' => 'Makerting',
   'NCPT' => 'Nghiên cứu phát triển',
   'NMCK' => 'Nhà máy cơ khí',
   'NMPE' => 'Nhà máy PE',
   'NMPT' => 'Nhà máy phụ tùng',
   'NMPVC' => 'Nhà máy PVC',
   'NSCL' => 'Nhân sự chiến lược',
   'QLDA' => 'Quản lý dự án',
   'TCKT' => 'Tài chính kế toán',
   'VT' => 'Vật tư',
   'VPCT' => 'Văn phòng công ty',
   'BDH' => 'Ban Điều Hành',
   'NCXDCL' => 'Ban nghiên cứu xây dựng chiến lược',
   'DVKH' => 'Dịch vụ khách hàng',
   'KTNB' => 'Kiểm Toán Nội Bộ',
   'MKT' => 'Makerting',
   'NMCK' => 'Nhà máy cơ khí',
   'NMPE' => 'Nhà máy PE',
   'NMPT' => 'Nhà máy phụ tùng',
   'NMPVC' => 'Nhà máy PVC',
   'NSCL' => 'Nhân sự chiến lược',
   'PTTT1' => 'Phát triển thị trường 1',
   'PTTT2' => 'Phát triển thị trường 2',
   'QLDA' => 'Quản lý dự án',
   'TCKT' => 'Tài chính kế toán',
   'VT' => 'Vật tư',
   'VPCT' => 'Văn phòng công ty',
   'MT' => 'Miền Trung',
   'BDH' => 'Ban Điều Hành',
   'NCXDCL' => 'Ban nghiên cứu xây dựng chiến lược'
);

// Use the $custom_css_url to override the standard MRBS CSS.
$custom_css_url = 'css/custom.css';

// Set this to a valid locale that is supported on the OS you run the
// MRBS server on if you want to override the automatic locale determination
// MRBS performs.  The locale should be in the form of a BCP 47 language
// tag, eg 'en-GB', or 'sr-Latn-RS'.   Note that MRBS will convert this into
// a format suitable for your OS, eg by adding '.utf-8' or changing it to 'eng'.

// Đặt thành ngôn ngữ hợp lệ được hỗ trợ trên hệ điều hành mà bạn chạy
// máy chủ MRBS nếu bạn muốn ghi đè xác định ngôn ngữ tự động
// MRBS thực hiện. Ngôn ngữ phải ở dạng thẻ ngôn ngữ BCP 47
//, ví dụ 'en-GB' hoặc 'sr-Latn-RS'. Lưu ý rằng MRBS sẽ chuyển đổi thành
// định dạng phù hợp với hệ điều hành của bạn, ví dụ bằng cách thêm '.utf-8' hoặc đổi thành 'eng'.
$override_locale = "vi-VN";
$disable_automatic_language_changing = true;
$default_language_tokens = "vi";