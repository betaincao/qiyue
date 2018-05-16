SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qiyue`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_appliance_info`
--

CREATE TABLE IF NOT EXISTS `think_appliance_info` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_num` varchar(20) CHARACTER SET utf8 NOT NULL,
  `a_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `a_detail` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `a_photo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `a_state` int(1) DEFAULT '0',
  `l_id` int(10) DEFAULT NULL,
  `a_outtime` int(10) DEFAULT NULL,
  `a_add` int(100) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `think_appliance_info`
--

INSERT INTO `think_appliance_info` (`a_id`, `a_num`, `a_name`, `a_detail`, `a_photo`, `a_state`, `l_id`, `a_outtime`, `a_add`) VALUES
(1, 'X3-5', '惠普电脑', '这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑这是一台电脑', '2018-05-12\\5af6b8aae4338.jpg', 1, 1, 1525298400, 5),
(2, 'X3-4', '戴尔显示器', '这是一台显示器', '2018-05-10/5af44d2ac2cec.png', 1, 1, 1525298400, 3),
(3, 'X3-3', '耳机', '这是一个耳机', '2018-05-10/5af44d2ac2cec.png', 1, 2, 1525298400, 4),
(4, 'X3-2', '键盘', '这是一个键盘', '2018-05-10/5af44d2ac2cec.png', 1, 2, 1525298400, 2),
(5, 'X-50', '照片', '这是一张照片', '2018-05-10/5af44d2ac2cec.png', 1, 1, 1525956101, 0),
(6, 'X-10086', '上传', '上传图片', '2018-05-10/5af44d2ac2cec.png', 1, 1, 1525958737, 0),
(7, 'X-222', '照片', '上传照片', '2018-05-10/5af44d2ac2cec.png', 1, 1, 1525959691, 0),
(8, 'X-100', '照片', '我的', '2018-05-10/5af44d2ac2cec.png', 1, 1, 1525959836, 0),
(9, '我的', '你的', '他的', '2018-05-10/5af44d2ac2cec.png', 1, 1, 1525959907, 0);

-- --------------------------------------------------------

--
-- 表的结构 `think_comment`
--

CREATE TABLE IF NOT EXISTS `think_comment` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `a_id` int(10) NOT NULL,
  `c_comment` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `c_state` int(1) DEFAULT '0',
  `c_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- 转存表中的数据 `think_comment`
--

INSERT INTO `think_comment` (`c_id`, `u_id`, `a_id`, `c_comment`, `c_state`, `c_time`) VALUES
(1, 1, 1, '很不错的仪器', 1, 1525298400),
(2, 1, 2, '还凑合', 0, 1525298400),
(3, 1, 3, '一般般', 2, 1525298400),
(4, 1, 2, NULL, 0, 1525872833),
(5, 1, 2, NULL, 0, 1525873136),
(6, 1, 2, NULL, 0, 1525941811),
(7, 1, 2, NULL, 0, 1525941857),
(8, 1, 2, NULL, 0, 1525941976),
(9, 1, 2, NULL, 0, 1525941986),
(10, 1, 2, NULL, 0, 1525942088),
(11, 1, 2, NULL, 0, 1525942125),
(12, 1, 2, NULL, 0, 1525942720),
(13, 1, 2, NULL, 0, 1525942795),
(14, 1, 2, NULL, 0, 1525942799),
(15, 1, 2, NULL, 0, 1525942822),
(16, 1, 2, NULL, 0, 1525942825),
(17, 1, 2, NULL, 0, 1525943041),
(18, 1, 2, NULL, 0, 1525943045),
(19, 1, 2, NULL, 0, 1525943074),
(20, 1, 2, NULL, 0, 1525943078),
(21, 1, 2, NULL, 0, 1525943261),
(22, 1, 2, NULL, 0, 1525943263),
(23, 1, 2, NULL, 0, 1525943315),
(24, 1, 2, NULL, 0, 1525943317),
(25, 1, 2, NULL, 0, 1525943356),
(26, 1, 2, NULL, 0, 1525943357),
(27, 1, 2, NULL, 0, 1525943366),
(28, 1, 2, NULL, 0, 1525943425),
(29, 1, 2, NULL, 0, 1525943428),
(30, 1, 2, NULL, 0, 1525943577),
(31, 1, 2, NULL, 0, 1525943751),
(32, 1, 2, NULL, 0, 1525943831),
(33, 1, 2, NULL, 0, 1525943942),
(34, 1, 2, NULL, 0, 1525943978),
(35, 1, 2, NULL, 0, 1525944053),
(36, 1, 2, NULL, 0, 1525944094),
(37, 1, 2, NULL, 0, 1525944840),
(38, 1, 2, NULL, 0, 1525944894),
(39, 1, 2, NULL, 0, 1525944894),
(40, 1, 2, NULL, 0, 1525944944),
(41, 1, 2, NULL, 0, 1525949318),
(42, 1, 2, NULL, 0, 1525949350),
(43, 1, 2, NULL, 0, 1525949357),
(44, 1, 2, NULL, 0, 1525949357),
(45, 1, 2, NULL, 0, 1525949509),
(46, 1, 2, NULL, 0, 1525949510),
(47, 1, 2, NULL, 0, 1525949519),
(48, 1, 2, NULL, 0, 1525949926),
(49, 1, 2, NULL, 0, 1525949940),
(50, 1, 2, NULL, 0, 1525949975),
(51, 1, 2, NULL, 0, 1525950168),
(52, 1, 2, '''comment.value''', 0, 1525950181),
(53, 1, 2, NULL, 0, 1525950181),
(54, 1, 2, '''comment.value''', 0, 1525950210),
(55, 1, 2, NULL, 0, 1525950210),
(56, 1, 2, NULL, 0, 1525950276),
(57, 1, 2, '''comment.value''', 0, 1525950287),
(58, 1, 2, NULL, 0, 1525950288),
(59, 1, 2, NULL, 0, 1525950301),
(60, 1, 2, '''comment.value''', 0, 1525950313),
(61, 1, 2, NULL, 0, 1525950313),
(62, 1, 2, NULL, 0, 1525950395),
(63, 1, 2, NULL, 0, 1525950396),
(64, 1, 2, '''comment.value''', 0, 1525950403),
(65, 1, 2, NULL, 0, 1525950403),
(66, 1, 2, '''comment.value''', 0, 1525950437),
(67, 1, 2, NULL, 0, 1525950437),
(68, 1, 2, NULL, 0, 1525950485),
(69, 1, 2, NULL, 0, 1525950512),
(70, 1, 2, NULL, 0, 1525950584),
(71, 1, 2, NULL, 0, 1525950586),
(72, 1, 2, NULL, 0, 1525950604),
(73, 1, 2, NULL, 0, 1525950608),
(74, 1, 2, NULL, 0, 1525951677),
(75, 1, 2, NULL, 0, 1525951677),
(76, 1, 2, NULL, 0, 1525951798),
(77, 1, 2, NULL, 0, 1525951798),
(78, 1, 2, NULL, 0, 1525951849),
(79, 1, 2, NULL, 0, 1525951850),
(80, 1, 2, NULL, 0, 1525951896),
(81, 1, 2, NULL, 0, 1525951896),
(82, 1, 2, NULL, 0, 1525951912),
(83, 1, 2, NULL, 0, 1525952034),
(84, 1, 2, NULL, 0, 1525952106),
(85, 1, 2, NULL, 0, 1525952139),
(86, 1, 2, NULL, 0, 1525952139),
(87, 1, 2, NULL, 0, 1525952174),
(88, 1, 2, NULL, 0, 1525952181),
(89, 1, 2, NULL, 0, 1525952182),
(90, 1, 2, NULL, 0, 1525952216),
(91, 1, 2, NULL, 0, 1525952217),
(92, 1, 2, NULL, 0, 1525952312),
(93, 1, 2, NULL, 0, 1525952313),
(94, 1, 2, NULL, 0, 1525952332),
(95, 1, 2, NULL, 0, 1525952768),
(96, 1, 2, NULL, 0, 1525952874),
(97, 1, 2, NULL, 0, 1525952935),
(98, 1, 2, NULL, 0, 1525952978),
(99, 1, 2, 'dawdawd', 0, 1526111623),
(100, 1, 2, '我有一个小毛驴', 0, 1526111660),
(101, 1, 0, '发粉色发', 0, 1526114520),
(102, 1, 0, '发粉色发', 0, 1526114600),
(103, 1, 2, '打分', 0, 1526114653),
(104, 1, 2, '最后一个', 0, 1526115142),
(105, 1, 2, '111111', 0, 1526115367),
(106, 1, 2, '111111', 0, 1526115397),
(107, 1, 2, '11111111111111111111111111111111111111111111111111111111111111111111111', 0, 1526214849),
(108, 1, 2, '11111111111111111111111111111111111111111111111111111111111111111111111', 0, 1526214851),
(109, 1, 2, '11111111111111111111111111111111111111111111111111111111111111111111111', 0, 1526214852),
(110, 1, 2, '11111111111111111111111111111111111111111111111111111111111111111111111', 0, 1526214853),
(111, 1, 2, '111111111111111111111111111', 0, 1526215053),
(112, 1, 2, '1111111111111111111111111111111111111', 0, 1526215083),
(113, 1, 2, '111111', 0, 1526215176),
(114, 1, 2, '11111111111111111111111', 0, 1526215238),
(115, 1, 2, '啊啊啊啊啊', 0, 1526215903),
(116, 1, 2, '1111111111111111111111111', 0, 1526215939),
(117, 1, 2, '地方大幅度的', 0, 1526215956);

-- --------------------------------------------------------

--
-- 表的结构 `think_conllect`
--

CREATE TABLE IF NOT EXISTS `think_conllect` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `a_id` int(10) NOT NULL,
  `c_time` int(10) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='仪器收藏表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `think_conllect`
--

INSERT INTO `think_conllect` (`c_id`, `u_id`, `a_id`, `c_time`) VALUES
(10, 1, 2, 1525679292);

-- --------------------------------------------------------

--
-- 表的结构 `think_laboratory`
--

CREATE TABLE IF NOT EXISTS `think_laboratory` (
  `l_id` int(10) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `l_appsum` int(100) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `think_laboratory`
--

INSERT INTO `think_laboratory` (`l_id`, `l_name`, `l_appsum`) VALUES
(1, '计算机应用技术协会', 20),
(2, 'ACAT', 25);

-- --------------------------------------------------------

--
-- 表的结构 `think_order_form`
--

CREATE TABLE IF NOT EXISTS `think_order_form` (
  `o_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `o_starttime` int(10) NOT NULL,
  `o_stoptime` int(10) NOT NULL,
  `o_teacher` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `o_state` int(1) DEFAULT '2',
  `o_extdata` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `o_cause` int(1) NOT NULL DEFAULT '0',
  `o_comment` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `think_order_form`
--

INSERT INTO `think_order_form` (`o_id`, `a_id`, `u_id`, `o_starttime`, `o_stoptime`, `o_teacher`, `o_state`, `o_extdata`, `o_cause`, `o_comment`) VALUES
(1, 1, 1, 1525334678, 1525334698, '余老师', 0, NULL, 0, 1),
(2, 2, 1, 1525334678, 1525334698, '余老师', 0, NULL, 0, 0),
(3, 3, 1, 1525334678, 1525334698, '余老师', 3, NULL, 0, 0),
(4, 4, 1, 1525334678, 1525334698, '余老师', 3, NULL, 0, 0),
(5, 4, 1, 1525334678, 1527782400, '余老师', 1, NULL, 0, 0),
(6, 3, 1, 1525334678, 1527782400, '余老师', 3, NULL, 0, 0),
(7, 4, 1, 1527782400, 1527782400, '余老师', 1, NULL, 0, 0),
(8, 3, 1, 1527782400, 1527782400, '余老师', 1, NULL, 0, 0),
(9, 1, 1, 1525708800, 0, '余老师', 3, NULL, 0, 0),
(10, 1, 1, 1525881600, 0, '王老师', 3, NULL, 0, 0),
(11, 1, 1, 1525708800, 1525795200, '李老师', 3, NULL, 0, 0),
(12, 1, 1, 1525708800, 1525795200, '李老师', 3, NULL, 0, 0),
(13, 1, 1, 1525881600, 1525968000, '杨老师', 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `think_user_info`
--

CREATE TABLE IF NOT EXISTS `think_user_info` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `u_class` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `u_phone` varchar(11) DEFAULT NULL,
  `u_stuid` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `think_user_info`
--

INSERT INTO `think_user_info` (`u_id`, `u_name`, `u_class`, `u_phone`, `u_stuid`) VALUES
(1, '刘龙航', '网络1402', '13468675069', '04142060'),
(13, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `think_user_login`
--

CREATE TABLE IF NOT EXISTS `think_user_login` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_phone` int(11) DEFAULT NULL,
  `u_passwd` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `u_state` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
