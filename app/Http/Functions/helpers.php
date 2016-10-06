<?php

class CsvHelper
{
    protected $handle = null;
    protected $delimiter;
    protected $enclosure;
    protected $escape;
    protected $withHeader = false;
    protected $header = [];

    /**
     * Open CSV file for writing.
     *
     * @param string $file      File name for writing CSV data. If not provided memory will be used as CSV file.
     * @param null   $delimiter @link http://php.net/manual/en/function.fputcsv.php
     * @param null   $enclosure @link http://php.net/manual/en/function.fputcsv.php
     * @param null   $escape    @link http://php.net/manual/en/function.fputcsv.php
     *
     * @return $this
     */
    public function append($file = 'php://memory', $delimiter = null, $enclosure = null, $escape = null)
    {
        if ($delimiter !== null) {
            $this->delimiter = $delimiter;
        } else {
            $this->delimiter = config('csv.delimiter');
        }

        if ($enclosure !== null) {
            $this->enclosure = $enclosure;
        } else {
            $this->enclosure = config('csv.enclosure');
        }

        if ($escape !== null) {
            $this->escape = $escape;
        } else {
            $this->escape = config('csv.escape');
        }

        $this->handle = fopen($file, 'a+');

        return $this;
    }

    /**
     * Close file pointer.
     */
    public function close()
    {
        fclose($this->handle);
    }

    /**
     * Write line to CSV file.
     *
     * @param array $row
     */
    public function writeLine(array $row)
    {
        $this->write($row);
    }

    /**
     * Write all line to CSV file at once.
     *
     * @param array $data
     */
    public function writeAll(array $data)
    {
        foreach ($data as $i => $row) {
            $this->writeLine($row);
        }
    }

    /**
     * Output all written data as string.
     *
     * @return string
     */
    public function flush()
    {
        rewind($this->handle);
        $out = stream_get_contents($this->handle);
        fseek($this->handle, 0, SEEK_END);

        return $out;
    }

    /**
     * Wrapper for fputcsv function.
     *
     * @param array $row
     */
    private function write(array $row)
    {
        if (config('csv.encoding.writer.enabled') === true) {
            foreach ($row as $k => $v) {
                $row[$k] = iconv(
                    config('csv.encoding.writer.from'),
                    config('csv.encoding.writer.to'),
                    $v
                );
            }
        }

        fputcsv($this->handle, $row, $this->delimiter, $this->enclosure, $this->escape);
    }

    public function open($file, $delimiter = null, $enclosure = null, $escape = null)
    {
        if ($delimiter !== null) {
            $this->delimiter = $delimiter;
        } else {
            $this->delimiter = config('csv.delimiter');
        }

        if ($enclosure !== null) {
            $this->enclosure = $enclosure;
        } else {
            $this->enclosure = config('csv.enclosure');
        }

        if ($escape !== null) {
            $this->escape = $escape;
        } else {
            $this->escape = config('csv.escape');
        }

        $this->handle = fopen($file, 'r+');

        return $this;
    }

    /**
     * Get CSV header. Usually it's a first line in file.
     *
     * @return array
     */
    public function getHeader()
    {
        $this->withHeader = true;
        if (ftell($this->handle) == 0) {
            $this->header = $this->read();
        }

        return $this->header;
    }

    /**
     * Read current line from CSV file.
     *
     * @return array
     */
    public function readLine()
    {
        $out = $this->read();
        if ($this->withHeader && is_array($out)) {
            $out = array_combine($this->header, $out);
        }

        return $out;
    }

    /**
     * Read all lines from CSV file.
     *
     * @return array
     */
    public function readAll()
    {
        $out = [];
        while (($row = $this->readLine()) !== false) {
            $out[] = $row;
        }

        return $out;
    }

    /**
     * Wrapper for fgetcsv function.
     *
     * @return array
     */
    private function read()
    {
        $out = fgetcsv($this->handle, null, $this->delimiter, $this->enclosure);

        if (!is_array($out)) {
            return $out;
        }

        if (config('csv.encoding.reader.enabled') === true) {
            foreach ($out as $k => $v) {
                $out[$k] = iconv(
                    config('csv.encoding.reader.from'),
                    config('csv.encoding.reader.to'),
                    $v
                );
            }
        }

        return $out;
    }
}
