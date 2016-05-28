

/**
 *
 * @author jiahaochen
 */
public class Utils {
    public static String parseName(String name){

        String[] nameParsed = name.split(" "); 
        if (nameParsed.length == 2)
            return nameParsed[0] + "_" + nameParsed[1]; 
        else
            return nameParsed[0] + "_" + nameParsed[1] + "_" + nameParsed[2]; 

    }
}
