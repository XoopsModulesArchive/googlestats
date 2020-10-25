<?php

/***************************************************************************
 * GoogleStats
 *
 * Author: Olivier Duffez, WebRankInfo ( http://www.webrankinfo.com )
 * Version: 2.0
 * Date: 2004-02-23
 * Homepage: http://www.googlestats.com
 ***************************************************************************/
/***************************************************************************
Basé sur "calendrier" de PHPtools4U.com - Mathieu LESNIAK
email : support@phptools4u.com
 ***************************************************************************/
/***************************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 **************************************************************************
 * @param $robot
 */
function afficherCalendrier($robot)
{
    global $PHP_SELF, $LANG, $TAB_MONTHS;

    if ('' != getVar('m')) {
        $tdClass = 'bg2';
    } else {
        $tdClass = 'bg3';
    }

    $rub = getVar('rub');

    $arg_day = '?rub=' . $rub . '&robot=' . $robot . '&d=';

    $arg_week = '?rub=' . $rub . '&robot=' . $robot . '&s=';

    $d = getVar('d');

    if ('' == $d) {
        $timestamp = time();
    } else {
        $month = mb_substr($d, 4, 2);

        $day = mb_substr($d, 6, 2);

        $year = mb_substr($d, 0, 4);

        $timestamp = mktime(0, 0, 0, $month, $day, $year);
    }

    $current_day = date('d', $timestamp);

    $current_month = date('n', $timestamp);

    $current_month_2 = date('m', $timestamp);

    $current_year = date('Y', $timestamp);

    $first_day_pos = date('w', mktime(0, 0, 0, $current_month, 1, $current_year));

    $first_day_pos = (0 == $first_day_pos) ? 7 : $first_day_pos;

    $current_month_name = $TAB_MONTHS[$current_month];

    $nb_days_month = date('t', $timestamp);

    $current_timestamp = mktime(23, 59, 59, date('m'), date('d'), date('Y'));

    $output = '<TABLE border="0" width="180" class="calendarTable" cellpadding="2" cellspacing="1">' . "\n";

    ### Displaying the current month/year

    $month_link = 'index.php?rub=' . $rub . '&robot=' . $robot . '&d=&s=&m=' . $current_month . '&ordre=' . $ordre . '&sens=' . $sens;

    $output .= '<tr>' . "\n";

    $output .= ' <td colspan="8" align="center" class="bg2">' . "\n";

    $output .= ' <a href="' . $month_link . '">' . $current_month_name . '</a> ' . $current_year . "\n";

    $output .= ' </td>' . "\n";

    $output .= '</tr>' . "\n";

    ### Building the table row with the days

    $output .= '<TR align="center">' . "\n";

    $output .= ' <td class="bg2">&nbsp;</td>' . "\n";

    $output .= ' <td class="bg2"><B>' . $LANG['Monday1'] . '</B></td>' . "\n";

    $output .= ' <td class="bg2"><B>' . $LANG['Tuesday1'] . '</B></td>' . "\n";

    $output .= ' <td class="bg2"><B>' . $LANG['Wednesday1'] . '</B></td>' . "\n";

    $output .= ' <td class="bg2"><B>' . $LANG['Thursday1'] . '</B></td>' . "\n";

    $output .= ' <td class="bg2"><B>' . $LANG['Friday1'] . '</B></td>' . "\n";

    $output .= ' <td class="bg2"><B>' . $LANG['Saturday1'] . '</B></td>' . "\n";

    $output .= ' <td class="bg2"><B>' . $LANG['Sunday1'] . '</B></td>' . "\n";

    $output .= '</tr>' . "\n";

    $output .= '<TR align="center">';

    $int_counter = 0;

    $loop_timestamp = mktime(0, 0, 0, $current_month, $i, $current_year);

    $week = date('W', $loop_timestamp);

    if ($current_timestamp < $loop_timestamp) {
        $output .= '<td class="bg2"><b>' . $week . '</b></td>' . "\n";
    } else {
        $output .= "<td class='bg2'>";

        $output .= "<a href='index.php?rub=" . $rub . $arg_week . $week . '&d=' . $current_year . $current_month_2 . $i_2 . "' class='calendarTopLink'><b>" . $week . "</b></A></td>\n";
    }

    // cells before the first day of the month

    for ($i = 1; $i < $first_day_pos; $i++) {
        $output .= '<td class="bg3">&nbsp;</td>' . "\n";

        $int_counter++;
    }

    // Building the table

    for ($i = 1; $i <= $nb_days_month; $i++) {
        $i_2 = ($i < 10) ? '0' . $i : $i;

        // Row start

        if (1 == (($i + $first_day_pos - 1) % 7) && 1 != $i) {
            $output .= '<TR align="center">' . "\n";

            $int_counter = 0;

            $loop_timestamp = mktime(0, 0, 0, $current_month, $i, $current_year);

            $week = date('W', $loop_timestamp);

            if ($current_timestamp < $loop_timestamp) {
                $output .= '<td class="bg2"><b>' . $week . '</b></td>' . "\n";
            } else {
                $output .= "<td class='bg2'>";

                $output .= "<a href='index.php" . $arg_week . $week . '&d=' . $current_year . $current_month_2 . $i_2 . "' class='calendarTopLink'><b>" . $week . "</b></A></td>\n";
            }
        }

        if ($i == $current_day) {
            $output .= '<td class="bg2" align="center">' . $i . '</td>' . "\n";
        } else {
            $loop_timestamp = mktime(0, 0, 0, $current_month, $i, $current_year);

            if ($current_timestamp < $loop_timestamp) {
                $output .= '<td class="bg3">' . $i . '</td>' . "\n";
            } else {
                $output .= "<td class='$tdClass'>";

                $output .= "<a href='index.php" . $arg_day . $current_year . $current_month_2 . $i_2 . "'>" . $i . "</A></td>\n";
            }
        }

        $int_counter++;

        // Row end

        if (0 == (($i + $first_day_pos - 1) % 7)) {
            $output .= '</tr>' . "\n";
        }
    }

    $cell_missing = 7 - $int_counter;

    for ($i = 0; $i < $cell_missing; $i++) {
        $output .= '<td class="bg3">&nbsp;</td>' . "\n";
    }

    $output .= '</tr>' . "\n";

    // Display the nav links on the bottom of the table

    $previous_month = date(
        'Ymd',
        mktime(
    12,
    0,
    0,
    ($current_month - 1),
    $current_day,
    $current_year
)
    );

    $previous_day = date(
        'Ymd',
        mktime(
    12,
    0,
    0,
    $current_month,
    $current_day - 1,
    $current_year
)
    );

    $next_day = date(
        'Ymd',
        mktime(
    1,
    12,
    0,
    $current_month,
    $current_day + 1,
    $current_year
)
    );

    $next_month = date(
        'Ymd',
        mktime(
    1,
    12,
    0,
    $current_month + 1,
    $current_day,
    $current_year
)
    );

    $g = '<img src="img/g.gif" border="0" alt="' . $LANG['PreviousDay'] . '">';

    $gg = '<img src="img/gg.gif" border="0" alt="' . $LANG['PreviousMonth'] . '">';

    $d = '<img src="img/d.gif" border="0" alt="' . $LANG['NextDay'] . '">';

    $dd = '<img src="img/dd.gif" border="0" alt="' . $LANG['NextMonth'] . '">';

    if ($current_timestamp < mktime(0, 0, 0, $current_month, $current_day + 1, $current_year)) {
        $next_day_link = '&nbsp;';
    } else {
        $next_day_link = '<a href="index.php?rub=' . $rub . '&d=' . $next_day . '&robot=' . $robot . '">' . $d . '</A>' . "\n";
    }

    if ($current_timestamp < mktime(0, 0, 0, $current_month + 1, $current_day, $current_year)) {
        $next_month_link = '&nbsp;';
    } else {
        $next_month_link = '<a href="index.php?rub=' . $rub . '&d=' . $next_month . '&robot=' . $robot . '">' . $dd . '</A>' . "\n";
    }

    $output .= '<tr>' . "\n";

    $output .= ' <td colspan="8" class="bg3">' . "\n";

    $output .= ' <table width="100%" border="0" >';

    $output .= ' <tr>' . "\n";

    $output .= ' <td width="25%" align="left" class="bg3">' . "\n";

    $output .= ' <b><a href="index.php?rub=' . $rub . '&d=' . $previous_month . '&robot=' . $robot . '">' . $gg . '</a></b>' . "\n";

    $output .= ' </td>' . "\n";

    $output .= ' <td width="25%" align="center" class="bg3">' . "\n";

    $output .= ' <a href="index.php?rub=' . $rub . '&d=' . $previous_day . '&robot=' . $robot . '">' . $g . '</a>' . "\n";

    $output .= ' </td>' . "\n";

    $output .= ' <td width="25%" align="center" class="bg3">' . "\n";

    $output .= $next_day_link;

    $output .= ' </td>' . "\n";

    $output .= ' <td width="25%" align="right" class="bg3">' . "\n";

    $output .= $next_month_link;

    $output .= ' </td>' . "\n";

    $output .= ' </tr>';

    $output .= ' </table>';

    $output .= ' </td>' . "\n";

    $output .= '</tr>' . "\n";

    $output .= '</table>' . "\n";

    echo $output;
}
