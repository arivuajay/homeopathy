<?php

class Myclass extends CController {

    public static function encrypt($value) {
        return hash("sha512", $value);
    }

    public static function refencryption($str) {
        return base64_encode($str);
    }

    public static function refdecryption($str) {
        return base64_decode($str);
    }

    public static function t($str = '', $params = array(), $dic = 'app') {
        return Yii::t($dic, $str, $params);
    }

    public static function getRandomString($length = 16) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //length:36
        $final_rand = '';
        for ($i = 0; $i < $length; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $final_rand;
    }

    public static function getVerificationcode($length = 6) {
        $chars = "1234567890";
        $final_rand = '';
        for ($i = 0; $i < $length; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $final_rand;
    }

    public static function notify_cli_email_hrs() {
        $data = array('24' => '24 Hours Before', '48' => '48 Hours Before');
        return $data;
    }

    public static function notify_cli_sms_hrs() {
        $data = array('2' => '2 Hours Before', '24' => '24 Hours Before');
        return $data;
    }

    public static function cancellation_policy($key = null) {
        $data = array('0' => 'Until appoinment begins', '1' => '1 Hour in advance', '2' => '2 Hour in advance', '4' => '4 Hour in advance', '6' => '6 Hour in advance',
            '8' => '8 Hour in advance', '10' => '10 Hour in advance', '12' => '12 Hour in advance', '18' => '18 Hour in advance',
            '24' => '1 Day in advance', '48' => '2 Days in advance', '72' => '3 Days in advance', '168' => '1 Week in advance', '336' => '2 Weeks in advance');

        if ($key)
            return $data[$key];

        return $data;
    }

    public static function last_chance_schedule() {
        $data = array('0' => 'Until appoinment begins', '1' => '1 Hour in advance', '2' => '2 Hour in advance', '4' => '4 Hour in advance', '6' => '6 Hour in advance',
            '8' => '8 Hour in advance', '10' => '10 Hour in advance', '12' => '12 Hour in advance', '18' => '18 Hour in advance',
            '24' => '1 Day in advance', '48' => '2 Days in advance', '72' => '3 Days in advance', '168' => '1 Week in advance', '336' => '2 Weeks in advance');
        return $data;
    }

    public static function time_slots() {
        $data = array('0' => 'are managed automatically', '15' => 'start every 15 minutes', '20' => 'start every 20 minutes',
            '30' => 'start every 30 minutes', '60' => 'start every 60 minutes');

        return $data;
    }

    public static function send_as() {
        $data = array('1' => 'Text message', '2' => 'E-mail');
        return $data;
    }

    public static function sento_list() {
        return array('1' => "All clients who accept newsletters ( <span id='email_users'></span> <span id='mob_users'></span> )", '2' => "Selected clients");
    }

    public static function event_classes() {
        $data = array('0' => 'are always open', '7' => 'open 1 week in advance', '14' => 'open 2 weeks in advance');
        return $data;
    }

    public static function spaces() {
        $spaces = range(1, 10);
        $lists = array_combine($spaces, $spaces);  //this function for both key and vlaue are same as...
        $lists["-1"] = "Other";
        return $lists;
    }

    public static function spaces_per_client($spaces) {
        $tot_spaces = is_null($spaces) ? 10 : $spaces;
        $spc = range(1, $tot_spaces);
        $lists = array_combine($spc, $spc);
//        $lists["-1"] = " ";
        return $lists;
    }

    public static function businessCategory() {
        $cats = array("Acupuncture", "Beauty salon", "Chiropractor", "Coach", "Consultant", "Dentist / dental", "Doctor", "Driving school", "Education", "Exhibitions / demonstrations", "Garage / auto shop", "Golf", "Gym", "Hairdresser", "Health & wellness", "Library", "Massage", "Medical center", "Music", "Naprapath", "Optician / ophthalmologist", "Physiotherapy", "Prenatal diagnosis", "Spa", "Sports");
        $lists = array_combine($cats, $cats);
        $lists["-1"] = "Other";
        return $lists;
    }

    public static function serviceduration() {
        $duration = array('15' => '15 min', '30' => '30 min', '45' => '45 min', '60' => '60 min');
        $duration["-1"] = "Other";
        return $duration;
    }

    public static function timeZoneLists() {
        $timezones = array("Pacific/Samoa" => "GMT -11:00) Midway Island, Samoa",
            "Pacific/Honolulu" => "GMT -10:00) Hawaii",
            "America/Anchorage" => "GMT -9:00) Alaska",
            "America/Los_Angeles" => "GMT -8:00) Pacific Time, Los Angeles",
            "America/Chihuahua" => "GMT -7:00) Mountain Time",
            "America/Chicago" => "GMT -6:00) Central Time, Chicago, Mexico City",
            "America/New_York" => "GMT -5:00) Eastern Time, New York, Miami",
            "America/Barbados" => "GMT -4:00) Atlantic Time (Canada), Caracas, La Paz",
            "America/St_Johns" => "GMT -3:30) Newfoundland Time",
            "Chile/Continental" => "GMT -3:00) Brazil, Buenos Aires, Georgetown",
            "Atlantic/South_Georgia" => "GMT -2:00) Mid-Atlantic",
            "Atlantic/Cape_Verde" => "GMT -1:00) Azores, Cape Verde Islands",
            "Europe/London" => "GMT +0:00) Western Europe, London, Lisbon, Casablanca",
            "Europe/Stockholm" => "GMT +1:00) Central Europe, Stockholm, Copenhagen",
            "Europe/Helsinki" => "GMT +2:00) Eastern Europe, Helsinki",
            "Africa/Johannesburg" => "GMT +2:00) South africa, Johannesburg",
            "Europe/Moscow" => "GMT +3:00) Baghdad, Kuwait, Riyadh, Moscow, Nairobi",
            "Asia/Tehran" => "GMT +3:30) Tehran",
            "Asia/Dubai" => "GMT +4:00) Dubai, Abu Dhabi, Muscat, Baku, Tbilisi",
            "Asia/Kabul" => "GMT +4:30) Kabul",
            "Asia/Ashgabat" => "GMT +5:00) Ekaterinburg, Islamabad, Karachi",
            "Asia/Calcutta" => "GMT +5:30) Calcutta, New Delhi, Chennai, Kolkata, Mumbai",
            "Asia/Katmandu" => "GMT +5:45) Katmandu",
            "Asia/Almaty" => "GMT +6:00) Almaty, Dhaka, Colombo",
            "Asia/Rangoon" => "GMT +6:30) Asia/Rangoon, Indian/Cocos",
            "Asia/Bangkok" => "GMT +7:00) Bangkok, Hanoi, Jakarta",
            "Asia/Taipei" => "GMT +8:00) Perth, Beijing,Singapore, Taipei",
            "Asia/Tokyo" => "GMT +9:00) Tokyo, Seoul, Yakutsk",
            "Australia/Adelaide" => "GMT +9:30) Adelaide",
            "Australia/Brisbane" => "GMT +10:00) Brisbane",
            "Australia/Sydney" => "GMT +10:00) Sydney, Melbourne",
            "Pacific/Norfolk" => "GMT +11:30) Norfolk",
            "Pacific/Fiji" => "GMT +12:00) Fiji",
            "Pacific/Auckland" => "GMT +13:00) Australia/Auckland");

        return $timezones;
    }

    public static function showEventType() {
        $data = array('1' => 'List', '2' => 'Calendar');
        return $data;
    }

    public static function req_opt_choice() {
        return array('0' => 'Optional', '1' => 'Required');
    }

    public static function scheduleInterval($interval, $stTime = "00:00:00", $enTime = "23:55:55") {
        $interval = (empty($interval)) ? 30 : $interval;

        $start = strtotime($stTime);
        $end = strtotime($enTime);

        $range = array();
        while ($start <= $end) {
            $range[date(LONG_TIME_FORMAT, $start)] = date(TIME_FORMAT, $start);
            $start = strtotime("+{$interval} minutes", $start);
            $range[date(LONG_TIME_FORMAT, $start)] = date(TIME_FORMAT, $start);
        }
        return $range;
    }

    public static function getServiceScheduleSlots($interval, $break, $stTime = "00:00:00", $enTime = "23:55:55") {
        $start = strtotime("2012-12-12 $stTime");
        $end = strtotime("2012-12-12 $enTime");
        $nxt_sch_min = $interval + $break;

        $sch_timing = array();
        $i = 0;
        for ($start; $start < $end; $start = strtotime("+$nxt_sch_min minutes", $start)) {
            $sch_timing[$i]['start'] = date(LONG_TIME_FORMAT, $start);
            $sch_timing[$i]['end'] = date(LONG_TIME_FORMAT, strtotime("+$interval minutes", $start));
            $i++;
        }
        return $sch_timing;
    }

    public static function getRepeatPeriod($key = null) {
        $days = array('7' => 'For one week', '14' => 'For two weeks', '31' => 'For one month', '62' => 'For two months', '183' => 'For six months', '0' => 'Others');
        if (!is_null($key))
            return $days[$key];
        return $days;
    }

    public static function getRepeatDay() {
        $days = array(Yii::t('admin', 'ADMIN350'), Yii::t('admin', 'ADMIN351'), Yii::t('admin', 'ADMIN352'), Yii::t('admin', 'ADMIN353'), Yii::t('admin', 'ADMIN354'), Yii::t('admin', 'ADMIN355'), Yii::t('admin', 'ADMIN356'));
        return array_combine($days, $days);
    }

    public static function getRepeatDates($dow, $startDt, $endDt) {
        /*         * Dynamic values* */
        $begin = new DateTime($startDt);
        $end = new DateTime($endDt);

        /*         * Dynamic values* */
        $begin = $begin->modify('+1 Day');
        $end = $end->modify('+1 Day');
        $interval = new DateInterval('P1D');
        $dates = array();
        foreach ($dow as $dw) {
            $interval = DateInterval::createFromDateString("next {$dw}");
            $daterange = new DatePeriod($begin, $interval, $end);

            foreach ($daterange as $date) {
                if (in_array($date->format("l"), $dow)) {
                    $dates[] = $date->format("Y-m-d");
                }
            }
        }

        sort($dates);

        return array_unique($dates);
    }

    public static function slugify($text) {
// replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
// trim
        $text = trim($text, '-');
// transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
// lowercase
        $text = strtolower($text);
// remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function getAccessdetail() {
        return array('1' => 'Administrator', '2' => 'Restricted user');
    }

    public static function getClientaccess() {
        return array('1' => 'Cant see the client database', '2' => 'Full access');
    }

    public static function getCellClass() {
        return array("1" => "book", "2" => "booked", "3" => "notavail", "4" => "holiday");
    }

    public static function getClassCalendarStatus($cid, $date = null) {
        $criteria = new CDbCriteria();
        $apptcriteria = new CDbCriteria();

        $apptcriteria->addCondition("cal_id = '{$cid}'");
        if (!is_null($date))
            $apptcriteria->addCondition("class_date = '{$date->format('Y-m-d')}'");
        $apptcriteria->select = "SUM(appt_spaces) AS booked_seats";
        $apptcriteria->group = "cal_id";
        $appModel = Classes::model()->with('classAppointments')->find($apptcriteria);

        $criteria->addCondition("cal_id = '{$cid}'");
        if (!is_null($date))
            $criteria->addCondition("class_date = '{$date->format('Y-m-d')}'");
        $criteria->select = "SUM(class_space) AS total_space";
        $criteria->group = "cal_id";
        $clsModel = Classes::model()->find($criteria);

        return array($appModel->booked_seats, $clsModel->total_space);
    }

    public static function getClassCalendarDailyStatus($cid) {
        $criteria = new CDbCriteria();

        $criteria->addCondition("cal_id = '{$cid}'");
        $criteria->select = "GROUP_CONCAT(DISTINCT(class_date)) as class_dates";
        $criteria->group = "cal_id";
        $clsModel = Classes::model()->find($criteria);
        $clsDates = explode(",", $clsModel->class_dates);

        foreach ($clsDates as $clDate):
            $date = new DateTime($clDate);
            $clDate = self::getClassCalendarStatus($cid, $date);
            $booked_seats = (!is_null($clDate[0])) ? $clDate[0] : 0;
            $data[] = array($date->format('Y-m-d'), $booked_seats);
        endforeach;

        return $data;
    }

    public static function getSingleClassCalendarStatus($clsid, $date) {
        $criteria = new CDbCriteria();

        $criteria->addCondition("class_id = '{$clsid}'");
        $criteria->addCondition("class_date = '{$date->format('Y-m-d')}'");
        $criteria->select = array('class_space AS total_space', new CDbExpression("IFNULL(SUM(appt_spaces),0) AS booked_seats"));
        $criteria->group = "class_id";

        return Classes::model()->with('classAppointments')->find($criteria);
    }

    public static function getClassCalDateCellStatus($cid, $date) {
        list($booked_seats, $total_space) = self::getClassCalendarStatus($cid, $date);

        $cellClass = self::getCellClass();
        $curTime = new DateTime();
        //Retrurn the Class
        if (@$total_space):
            if ($date < $curTime):
                $dayClass = $cellClass[3];
            elseif ($total_space == $booked_seats):
                $dayClass = $cellClass[2];
            elseif ($total_space >= $booked_seats):
                $dayClass = $cellClass[1];
            endif;
        else:
            $dayClass = $cellClass[4];
        endif;

        return $dayClass;
    }

    public static function getServiceCalendarStatus($cid, $date) {
        $cal = Calendar::model()->findByPk($cid);
        $criteria = new CDbCriteria();

        $criteria->addCondition("cal_id = '{$cid}'");
        $criteria->addCondition("service_date = '{$date->format('Y-m-d')}'");
        $criteria->select = "*";
        return ServicesSchedule::model()->findAll($criteria);
    }

    public static function getServiceStatus($sid, $date = null) {
        $criteria = new CDbCriteria();

        $criteria->addCondition("service_id = '{$sid}'");
        if (!is_null($date))
            $criteria->addCondition("service_date = '{$date->format('Y-m-d')}'");
        $schedules = ServicesSchedule::model()->findAll($criteria);
        $dayTotalSlots = 0;
        foreach ($schedules as $schedule):
            $slots = self::getServiceScheduleSlots($schedule->service->service_duration, $schedule->service->service_break, $schedule->service_starttime, $schedule->service_endtime);
            $dayTotalSlots += count($slots);
        endforeach;
        $criteria2 = new CDbCriteria();
        $criteria2->addCondition("appt_serv_id = '$sid'");
        if (!is_null($date))
            $criteria2->addCondition("appt_date = '{$date->format('Y-m-d')}'");

        $dayTotalAppoint = ServiceAppoitments::model()->count($criteria2);

        return array($dayTotalSlots, $dayTotalAppoint);
    }

    public static function getSingleServiceCalDateCellStatus($sid, $date) {
        list($dayTotalSlots, $dayTotalAppoint) = self::getServiceStatus($sid, $date);

        $cellClass = self::getCellClass();
        $curTime = new DateTime();

        //Retrurn the Class
        if (@$dayTotalSlots):
            if ($date < $curTime):
                $dayClass = $cellClass[3];
            elseif ($dayTotalSlots == $dayTotalAppoint):
                $dayClass = $cellClass[2];
            elseif ($dayTotalSlots >= $dayTotalAppoint):
                $dayClass = $cellClass[1];
            endif;
        else:
            $dayClass = $cellClass[4];
        endif;

        return $dayClass;
    }

    public static function getServiceCalDateCellStatus($cid, $date) {
        $results = self::getServiceCalendarStatus($cid, $date);

        $cellClass = self::getCellClass();
        $curTime = new DateTime();

        //Retrurn the Class
        if (@$results):
            $dayTotalSlots = 0;

            foreach ($results as $result):
                $slots = self::getServiceScheduleSlots($result->service->service_duration, $result->service->service_break, $result->service_starttime, $result->service_endtime);
                $dayTotalSlots += count($slots);
            endforeach;
            $dayTotalAppoint = ServiceAppoitments::model()->count("appt_cal_id = '$cid' AND appt_date = '{$date->format('Y-m-d')}'");

            if ($date < $curTime):
                $dayClass = $cellClass[3];
            elseif ($dayTotalSlots == $dayTotalAppoint):
                $dayClass = $cellClass[2];
            elseif ($dayTotalSlots >= $dayTotalAppoint):
                $dayClass = $cellClass[1];
            endif;
        else:
            $dayClass = $cellClass[4];
        endif;

        return $dayClass;
    }

    public static function setCalendarCurrentDate($date) {
        $curDate = new DateTime();
        if (!is_null($date)) {
            $strDate = strtotime($date);
            $year = date('Y', $strDate);
            $month = date('m', $strDate);
            $day = date('d', $strDate);
            $curDate->setDate($year, $month, $day);
        }

        return $curDate;
    }

    public static function amountFormat($amt) {
        return PRICE_SYMBOL . " " . number_format($amt, 2);
    }

    public static function getComfirmationvia($model) {
        $result = array();
        if ($model->cellphone)
            $result['2'] = 'Text Message';
        if ($model->user->useremail)
            $result['1'] = 'Email';

        return $result;
    }

    public static function getTimeDiff($start, $end) {
        $start_date = new DateTime($start);
        $end_date = new DateTime($end);

        return $start_date->diff($end_date);
    }

    public static function getScheduleSlots($interval, $break, $stTime = "00:00:00", $enTime = "23:55:55") {
        $start = strtotime("2012-12-12 $stTime");
        $end = strtotime("2012-12-12 $enTime");
        $nxt_sch_min = $interval + $break;

        $sch_timing = array();
        $i = 0;
        for ($start; $start < $end; $start = strtotime("+$nxt_sch_min minutes", $start)) {
            if ($end >= strtotime("+$interval minutes", $start)) {
                $sch_timing[$i]['start'] = date(LONG_TIME_FORMAT, $start);
                $sch_timing[$i]['end'] = date(LONG_TIME_FORMAT, strtotime("+$interval minutes", $start));
                $i++;
            }
        }
        return $sch_timing;
    }

    public static function getSeatMessage($booked_seats = 0, $total_space, $state = null) {
        $avail_seat = $total_space - $booked_seats;

        if ((!isset(Yii::app()->user->id) || @Yii::app()->user->user_type == '4') && COMPANY_EVT_INFO_CLIENT == 0):
            return ($avail_seat == 0) ? "Booked" : "Available";
        endif;

        if ($avail_seat == 0) {
            $seat_msg = (COMPANY_EVT_INFO_CLIENT == 1) ? "All {$total_space} spaces are reserved" : '';
        } else {
            if ($state == 'event_update'):
                $seat_msg = "This event already has {$booked_seats} reserved space(s)";
            elseif ($state == 'event_list'):
                $seat_msg = "<br /> {$total_space} Spaces left.";
                if ($booked_seats > 0):
                    $seat_msg .= "{$booked_seats} Spaces are reserved";
                endif;
            else:
                $seat_msg = "Only {$avail_seat} space left";
            endif;
        }

        return $seat_msg;
    }

    public static function getTimeDiffInHours($end, $start = "NOW") {
        // Hours
        define("SECONDS_PER_HOUR", 60 * 60);
        // Calculate timestamp
        $start = strtotime($start);
        $stop = strtotime($end);
        // Diferences
        $difference = $stop - $start;
        // Hours
        $hours = $difference / SECONDS_PER_HOUR;
//	// Minutes
//        $minutes = ($difference % SECONDS_PER_HOUR) / 60;
        return $hours;
    }

    public static function rememberMeComputer($username, $check) {
        if ($check > 0) {
            $time = time();     // Gets the current server time                                          
            $cookie = new CHttpCookie('altimus_app_username', $username);
            $cookie->expire = $time + 60 * 60 * 24 * 30;               // 30 days
            Yii::app()->request->cookies['altimus_app_username'] = $cookie;
        } else {
            unset(Yii::app()->request->cookies['altimus_app_username']);
        }
    }

//      public static function rememberMycity($city) {
////        if ($check > 0) {
//            $time = time();     // Gets the current server time                                          
//            $cookie = new CHttpCookie('cityname', $city);
//            $cookie->expire = $time + 60 * 60 * 24 * 30;               // 30 days
//            Yii::app()->request->cookies['cityname'] = $cookie;
////        } else {
////            unset(Yii::app()->request->cookies['altimus_app_username']);
////        }
//    }
    public static function getMonth() {
        return array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
    }

    public static function getMeal() {
        $lists = array('Breakfast', 'Dinner', 'Lunch', 'Snak');
        $array = array_combine($lists, $lists);
        return $array;
    }

    public static function getRefills() {
        $array = range(0, 20);
        array_unshift($array, "PRN");

        return array_combine($array, $array);
    }

    public static function getTakentype() {
        $lists = array('tablet(s)', 'drop(s)', 'capsule(s)', 'tsp(s)', 'tbsp(s)', 'puff(s)', 'application(s)');
        $array = array_combine($lists, $lists);
        return $array;
    }

    public static function getFrequencytaken() {
        $lists = array('as needed (PRN)', 'every 1 hr', 'every 2hrs', 'every 3hrs', 'every 4hrs', 'every morning', 'every evening', 'once a day', '2 times a day', '3 times a day', '4 times a day', 'once a week', 'twice a week', 'three times a week', 'four times a week', 'before bed', 'before meals', 'with meals');
        $array = array_combine($lists, $lists);
        return $array;
    }

    public static function getSeverity() {
        $lists = array('Mild', 'Moderate', 'Severe', 'Life threatening');
        $array = array_combine($lists, $lists);
        return $array;
    }

    public static function getSphere() {
        $array = range(-20.00, +20.00, 00.25);

        return array_combine($array, $array);
    }

    public static function getCylinder() {
        $array = range(-0.50, -4.75, 0.25);

        return array_combine($array, $array);
    }

    public static function getAxis() {
        $array = range(0, 180);

        return array_combine($array, $array);
    }

    public static function getVerticalprismcol1() {
        $array = range(0.00, 10.00, 0.50);

        return array_combine($array, $array);
    }

    public static function getVerticalprismcol2() {
        $lists = array('BU', 'BD');
        $array = array_combine($lists, $lists);
        return $array;
    }

    public static function getHorizontalprismcol1() {
        $array = range(0.00, 10.00, 0.50);

        return array_combine($array, $array);
    }

    public static function getHorizontalprismcol2() {
        $lists = array('BI', 'BO');
        $array = array_combine($lists, $lists);
        return $array;
    }

    public static function getAddforreading() {
        $array = range(0.75, 3.00, 0.25);

        return array_combine($array, $array);
    }

    public static function getBc() {
        $array = range(8.0, 9.3, 0.1);

        return array_combine($array, $array);
    }

    public static function getDia() {
        $array = range(13.0, 15.0, 0.1);

        return array_combine($array, $array);
    }

    public static function getTypeofcontact() {

        return array('SINGLE VERSION' => array('Single Vision Soft' => 'soft', 'Single Vision Hard' => 'Hard', 'Single Vision Gas Permeable' => 'Gas Permeable', 'Single Vision Gas Permeable Extended Wear' => 'Gas Permeable Extended Wear', 'Single Vision Extended Wear' => 'Extended Wear', 'Single Vision Disposable (Daily)' => 'Disposable (Daily)', 'Single Vision Disposable (7day)' => 'Disposable (7day)', 'Single Vision Disposable (14day)' => 'Disposable (14day)', 'Single Vision Colored Soft' => 'Colored Soft', 'Single Vision Colored Extended Wear' => 'Colored Extended Wear'),
            'BIFOCAL' => array('Bifocal Soft' => 'Soft', 'Bifocal Hard' => 'Hard', 'Bifocal Gas Permeable' => 'Gas Permeable', 'Bifocal Gas Permeable Extended Wear' => 'Gas Permeable Extended Wear', 'Bifocal Extended Wear' => 'Extended Wear', 'Bifocal Colored Soft' => 'Colored Soft', 'Bifocal Colored Extended Wear' => 'Colored Extended Wear'),
            'TORIC' => array('Toric Soft' => 'Soft', 'Toric Hard' => 'Hard', 'Toric Gas Permeable' => 'Gas Permeable', 'Toric Gas Permeable Extended Wear' => 'Gas Permeable Extended Wear', 'Toric Extended Wear' => 'Extended Wear', 'Toric Colored Soft' => 'Colored Soft', 'Toric Colored Extended Wear' => 'Colored Extended Wear'),
            'SPECIALTY KERATOCONUS' => array('Specialty Keratoconus' => 'Specialty Keratoconus'),
            'SPECIALTY OTHER' => array('Specialty Other' => 'Specialty Other'));
    }

    public static function rememberMeAdmin($username, $check) {
        if ($check > 0) {
            $time = time();     // Gets the current server time                                          
            $cookie = new CHttpCookie('admin_username', $username);

            $cookie->expire = $time + 60 * 60 * 24 * 30;               // 30 days
            Yii::app()->request->cookies['admin_username'] = $cookie;
        } else {
            unset(Yii::app()->request->cookies['admin_username']);
        }
    }

    public static function sendSms($mobno, $message) {
        $post_data = array(
            'From' => SITENAME,
            'To' => $mobno,
            'Body' => $message,
        );

        $exotel_sid = "creativert"; // Your Exotel SID - Get it from here: http://my.exotel.in/Exotel/settings/site#api-settings
        $exotel_token = "baec40553f33d4949c8601994e51a5d968d0fb22"; // Your exotel token - Get it from here: http://my.exotel.in/Exotel/settings/site#api-settings

        $url = "https://" . $exotel_sid . ":" . $exotel_token . "@twilix.exotel.in/v1/Accounts/" . $exotel_sid . "/Sms/send";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        $return = true;
        if (!curl_exec($ch)) {
            echo "Error:" . curl_error($ch);
            exit;
            $return = false;
        }
        curl_close($ch);
        return $return;
    }

    public static function getFacilities($opt = null) {
        $fac = array('1' => 'Emergency Department', '2' => 'Hospital', '3' => 'Urgent Care', '4' => 'Retail Clinic', '6' => 'Home Health Care');
        if (!is_null($opt)):
            return $fac[$opt];
        else:
            return $fac;
        endif;
    }

    public static function getMonths($opt = null) {
        $months = array('0' => 'Trial Period', '30' => '1 Month', '60' => '2 Months', '90' => '3 Months', '180' => '6 Months', '365' => '12 Months');
        if (!is_null($opt)):
            return $months[$opt];
        else:
            return $months;
        endif;
    }

    public static function getOptions($opt = NULL) {
        $fac = array('1' => 'Yes', '2' => 'No','3'=>"Don't Know");
        if (!is_null($opt)):
            return $fac[$opt];
        else:
            return $fac;
        endif;
    }

    public static function multi_arr_to_sin_arr($array) {
        if (!$array)
            return false;
        $flat = array();
        $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));

        foreach ($iterator as $value)
            $singhal[] = $value;
        return $singhal;
    }

    public static function getGender($option = null) {
        $gender = array("1" => "Male", "2" => "Female");
        if ($option)
            return $gender[$option];
        return $gender;
    }

    public static function getHumanpartsname($partid = null) {
        $parts = array("0" => "Legs", "1" => "Head", "2" => "Neck", "3" => "Shoulder", "4" => "Chest", "5" => "Arms", "6" => "Abdomen", "7" => "Pelvis", "8" => "Hips", "9" => "Feet", "10" => "Hands", "11" => "Back", "12" => "Lower Back", '13' => 'Buttock/Rectum');

        if (!is_null($partid)):
            return $parts[$partid];
        else:
            return $parts;
        endif;
    }

    public static function getSymptomsfor() {
        $symptoms = array("1" => 'Male', "2" => "Female", "3" => "Both");
        return $symptoms;
    }

    public static function hideprint($value) {
        if ($value == "1"):
            $hide = 'Yes';
        else:
            $hide = 'No';
        endif;
        return $hide;
    }

    public static function stillhave($value) {
        if ($value == "1"):
            $have = 'Yes';
        else:
            $have = 'No';
        endif;
        return $have;
    }

    public static function visittype() {
        $visit = array("", "Care Planning Visit", "Consult/Evaluation Visti", "Counseling/Behavior Therapy",
            "Dental Visit", "Emergency Care Visit", "Eye Exam Evaluation", "Home Care Visit",
            "Hospital Visit", "Newborn Exam", "Nursing Home Visit", "Office Visit", "Outpatient Visit",
            "Preventative Care Visit", "Telephone/Email Visit"
        );
        return array_combine($visit, $visit);
    }

    public static function reporttype() {
        $type = array("" => "(Unspecified)", "Diagnostic Report", "Health Record Report", "Medical Directive", "Medical Record",
            "Physician'''s Report", "Test Result", "X-Ray/MRI", "Other");
        return array_combine($type, $type);
    }

    public static function cond_status() {
        $status = array("Currently has this", "Comes and goes", "No longer has this");
        return array_combine($status, $status);
    }

    public static function strength_unit($key = null) {
        $status = array("cfuperml" => "Colony forming units per milliliter (cfu/ml)", "iu" => "International unit (iu)", "meq" => "Milliequivalent (meq)", "meqperml" => "Milliequivalent per milliliter (meq/ml)", "mg" => "Milligram (mg)", "mgperml" => "Milligram per milliliter (mg/ml)", "ml" => "Milliliter (ml)", "percent" => "Percent (%)", "unt" => "Unit (unt)", "untperml" => "Units per milliliter (unt/ml)");
        if (!is_null($key))
            return $status[$key];
        else
            return $status;
    }

    public static function dosage_unit($key = null) {
        $status = array("Applicatorfuls" => "Applicatorfuls",
            "Bags" => "Bags",
            "Bars" => "Bars",
            "Capsules" => "Capsules",
            "Doses" => "Doses",
            "Dropperfuls" => "Dropperfuls",
            "Drops" => "Drops",
            "g" => "Grams (g)",
            "Inhalations" => "Inhalations",
            "Lozenges" => "Lozenges",
            "mcg" => "Micrograms (mcg)",
            "mg" => "Milligrams (mg)",
            "ml" => "Milliliters (ml)",
            "Packets" => "Packets",
            "Pads" => "Pads",
            "Patches" => "Patches",
            "Percent" => "Percent (%)",
            "Puffs" => "Puffs",
            "Scoops" => "Scoops",
            "Shots" => "Shots",
            "Sprays" => "Sprays",
            "Suppositories" => "Suppositories",
            "Syringe" => "Syringe",
            "tbsp" => "Tablespoons (tbsp)",
            "Tablets" => "Tablets",
            "tsp" => "Teaspoons (tsp)",
            "Units" => "Units (U)"
        );
        if (!is_null($key))
            return $status[$key];
        else
            return $status;
    }

    public static function med_taken($key = null) {
        $status = array("inj" => "By injection",
            "po" => "By mouth",
            "otic" => "In the ear",
            "oph" => "In the eye",
            "nas" => "In the nose (spray/drops)",
            "inh" => "Inhaled",
            "pr" => "Rectal",
            "pg" => "Through a feeding tube",
            "iv" => "Through an intravenous (IV) line",
            "top" => "Through the skin",
            "sl" => "Under the tongue",
            "vag" => "Vaginal");
        if (!is_null($key))
            return $status[$key];
        else
            return $status;
    }

    public static function prescribed_type($key = null) {
        $status = array("OTC" => "Over the Counter (OTC)",
            "prescribed" => "Prescribed",
            "prescribedOTC" => "Prescribed OTC");

        if (!is_null($key))
            return $status[$key];
        else
            return $status;
    }

    public static function blood_msr_content() {
        $content = array('After breakfast', 'After dinner', 'After exercise', 'After lunch', 'After meal',
            'Before bedtime', 'Before breakfast', 'Before dinner', 'Before exercise', 'Before lunch',
            'Before meal', 'Fasting', 'Ignore', 'Non-fasting');
        return array_combine($content, $content);
    }

    public static function blood_type() {
        $type = array('Plasma', 'Whole blood');
        return array_combine($type, $type);
    }
    public static function address_type(){
        $address_type = array('Business','Other','Personal');
        return array_combine($address_type, $address_type);
    }

}
