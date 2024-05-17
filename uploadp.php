<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PLC Code Repo</title>

    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="icon" href="favicon.png" type="image/png">

</head>

<body>

    <header>
            <section style="padding-left: 10px; padding-top: 10px; background-color: #3c3c3c;"><a href="index.html"><img src="/imgs/weblogo2.png" width="50" height="50"></a></section>
            <h1><a href="index.html">PLC Code Repo</a></h1>
            <h2><a href="index.html">An Effort for Static Code Analysis for PLCs</a></h2>
    </header>

    <pre>
        <strong>
        <nav><a href="about.html">About</a>   |   <a href="uploadp.php">Upload</a>   |   <a href="contact.html">Contact</a>   |   <a href="docs.html">Documentation</a></nav>
        </strong>
    </pre>


<section class="section-1">
    <section class="section-2">
        <p style="font-size:30px; font-family:helvetica"><strong>Select Your Files:</strong></p>
        <form action="codeupload.php" method="post" enctype="multipart/form-data">
            <label for="plcFile"><strong>PLC program file:</strong></label>
            <input type="file" name="plcFile" id="plcFile" accept=".acd,.l5x,.l5k,.rss,.dmd,.xef,.dcf,.apr,.zap13,.project,.xml," required>
            <br>
            <br>
            <label for="supplementaldocs"><strong>Supplemental file (P&ID, text, image):</strong></label>
            <input type="file" name="supplementaldocs" id="supplementaldocs" accept=".pdf,.jpg,.png,.txt" required>
            <p style="font-family:helvetica">*NOTE - Each file selection box is limited to a single file per upload</p>
    </section>

    <section class="section-2">
        <p style="font-size:30px; font-family:helvetica"><strong>Tell Us More:</strong></p>
            <label for="vendor"><strong>Vendor IDE used:</strong></label>
            <select id="vendor" name="vendor" required>
                <option value="Select vendor">--Please Select--</option>
                <option value="Rockwell Automation">Rockwell Automation</option>
                <option value="Automation Direct Do-More">Automation Direct</option>
                <option value="Schneider Electric">Schneider Electric</option>
                <option value="Siemens">Siemens</option>
                <option value="CODESYS">CodeSys</option>
            </select>
        <br>
        <br>
            <label for="language"><strong>Primary language used:</strong></label>
            <select id="lang" name="lang" required>
                <option value="Select language">--Please Select--</option>
                <option value="Ladder Logic">Ladder Diagram</option>
                <option value="Structured Text">Structured Text</option>
                <option value="Function Block Diagram">Function Block Diagram</option>
                <option value="Sequential Function Chart">Sequential Function Chart</option>
            </select>
        <br>
        <br>
            <label for="role"><strong>PLC Programmer Type:</strong></label>
            <select id="IndProfOrStu" name="IndProfOrStu">
                <option value="Select a role">--Please Select--</option>
                <option value="Industry Professional">Industry Professional</option>
                <option value="Student">Student</option>
            </select>
        <br>
        <br>
            <label for="theorhetical"><strong>Used in actual control system:</strong></label>
            <select id="RealWorldSys" name="RealWorldSys">
                <option value="Select an option">--Please Select--</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
    </section>

    <button onclick="changeColor()"; type="submit" name="submit"><strong>Upload</strong></button>
    
        </form>
</section>

    <footer>
    <section style="background-color: #48494B; font-size: 12px; max-width: 1300px; margin: 5px auto; padding: 10px; border: 1px solid Black; border-radius: 30px; position: relative;">
    By submitting code, you are agreeing to the <a href="https://www.isu.edu/ogc/privacy/">ISU Privacy Policy</a> in addition to the <a href="\pdf\privacy-policy.pdf">PLC Code Repo Privacy Policy</a>, and to the sharing of your program with PLC Code Repo. Please do not submit any personal information; PLC Code Repo is not responsible for the contents of your submission. The code you submit to PLC Code Repo will be used for research purposes only.
    </section>
    </footer>

</body>
<div style="background-color:transparent" class="extra-space"></div>
</html>
