<?php
namespace JakubPas\Exception;

/**
 * Class Handler
 * @author Jakub Pas
 * @package JakubPas\Exception
 */
class Handler
{
    public static function oldDebugMode()
    {
        error_reporting(E_ALL);
        ini_set("display_errors", true);
    }


    public static function set()
    {
        set_error_handler(
            function ($err_severity, $err_msg, $err_file, $err_line, array $err_context) {
                if (0 === error_reporting()) {
                    return false;
                }
                switch ($err_severity) {
                    case E_ERROR:
                        throw new \ErrorException            (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_WARNING:
                        throw new WarningException          (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_PARSE:
                        throw new ParseException            (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_NOTICE:
                        throw new NoticeException           (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_CORE_ERROR:
                        throw new CoreErrorException        (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_CORE_WARNING:
                        throw new CoreWarningException      (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_COMPILE_ERROR:
                        throw new CompileErrorException     (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_COMPILE_WARNING:
                        throw new CoreWarningException      (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_USER_ERROR:
                        throw new UserErrorException        (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_USER_WARNING:
                        throw new UserWarningException      (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_USER_NOTICE:
                        throw new UserNoticeException       (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_STRICT:
                        throw new StrictException           (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_RECOVERABLE_ERROR:
                        throw new \ErrorException (
                            $err_msg, $err_severity, 0, $err_file, $err_line
                        );
                    case E_DEPRECATED:
                        throw new DeprecatedException       (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                    case E_USER_DEPRECATED:
                        throw new UserDeprecatedException   (
                            $err_msg, 0, $err_severity, $err_file, $err_line
                        );
                }
                unset($err_context);
                return true;
            }
        );
        return false;
    }

    /**
     * @param \Exception $exception
     * @return string
     * @todo Fix this to get full stack trace
     */
    public static function getExceptionTraceAsString(\Exception $exception) {
        $rtn = "";
        $count = 0;
        foreach ($exception->getTrace() as $frame) {
            $args = "";
            if (isset($frame['args'])) {
                $args = array();
                foreach ($frame['args'] as $arg) {
                    if (is_string($arg)) {
                        $args[] = "'" . $arg . "'";
                    } elseif (is_array($arg)) {
                        $args[] = "Array";
                    } elseif (is_null($arg)) {
                        $args[] = 'NULL';
                    } elseif (is_bool($arg)) {
                        $args[] = ($arg) ? "true" : "false";
                    } elseif (is_object($arg)) {
                        $args[] = get_class($arg);
                    } elseif (is_resource($arg)) {
                        $args[] = get_resource_type($arg);
                    } else {
                        $args[] = $arg;
                    }
                }
                $args = join(", ", $args);
            }
            $rtn .= sprintf( "#%s %s(%s): %s(%s)\n",
                $count,
                isset($frame['file']) ? $frame['file'] : 'unknown file',
                isset($frame['line']) ? $frame['line'] : 'unknown line',
                (isset($frame['class']))  ? $frame['class'].$frame['type'].$frame['function'] : $frame['function'],
                $args );
            $count++;
        }
        return $rtn;
    }
} 