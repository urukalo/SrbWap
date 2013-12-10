<?php
    function GetCacheFileName( $aFileName )
    {
        return $aFileName . ".cache";
    }
    
    function DumpCacheFile( $aFileName, $aExpire = 3600 )
    {
        $aCacheFile = GetCacheFileName( $aFileName );
        if ( is_file( $aCacheFile ) == True )
        {
            $aModTime = filemtime( $aCacheFile );
            $aCurTime = time();
            
            if ( ( $aCurTime - $aModTime ) > $aExpire )
            {
                return False;
            }
            else
            {
        if ($file = @fopen("$aCacheFile", "r")){;$stop=0;
		while (!feof ($file) || $stop==100)
		{
		$stop++;
		$line = fgets ($file, 512);
		$fajl=$fajl.$line;
		}

		fclose($file);}
                return $fajl;
            }
        }
    }
    
    function SaveCacheFile( $aFileName, $aContents )
    {
        $aCacheFile = GetCacheFileName( $aFileName );
        $aFile = @fopen( $aCacheFile, "w" );
        @fwrite( $aFile, $aContents );
        @fclose( $aFile );
    }
?>
