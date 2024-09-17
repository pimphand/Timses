const axios = require("axios");
const fs = require("fs"); // Import file system module

const url =
    "https://geoserver.jabarprov.go.id/geoserver/peta_dasar/ows?service=WFS&version=1.0.0&request=GetFeature&outputFormat=application%2Fjson&typeName=peta_dasar%3Aadministrasi_ar_10k_kecamatan_jabar_2023&cql_filter=(kdbbps=%273202%27)";

const headers = {
    "User-Agent":
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:130.0) Gecko/20100101 Firefox/130.0",
    Accept: "application/json, text/plain, */*",
    "Accept-Language": "en-US,en;q=0.5",
    "Accept-Encoding": "gzip, deflate, br, zstd",
    Referer: "https://opendata.sukabumikab.go.id/",
    "Content-Type": "application/json",
    Authorization: "Basic b2RqOlRFejZycVBONHMzMiRAZXVNfmkq",
    Origin: "https://opendata.sukabumikab.go.id",
    Connection: "keep-alive",
    "Sec-Fetch-Dest": "empty",
    "Sec-Fetch-Mode": "cors",
    "Sec-Fetch-Site": "cross-site",
    Priority: "u=4",
    Pragma: "no-cache",
    "Cache-Control": "no-cache",
    TE: "trailers",
};

axios
    .get(url, { headers })
    .then((response) => {
        // Save response data to data.json
        fs.writeFile(
            "data.json",
            JSON.stringify(response.data, null, 2),
            (err) => {
                if (err) {
                    console.error("Error saving data to file:", err);
                } else {
                    console.log("Data saved to data.json");
                }
            }
        );
    })
    .catch((error) => {
        console.error("Error fetching data:", error);
    });
