<template>
  <v-content>
    <v-container fluid>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">ダウンロード</th>
              <th class="text-left">オーナー名</th>
              <th class="text-left">コメント</th>
              <th class="text-left">ファイル名</th>
              <th class="text-left">アップロード日時</th>
              <th class="text-left">削除</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in desserts" :key="item.name">
              <td>
                <v-icon>mdi-cloud-download-outline</v-icon>
              </td>
              <td>{{ item.name }}</td>
              <td style="white-space:pre-wrap; word-wrap:break-word;">{{ item.comments }}</td>
              <td>{{ item.file_name }}</td>
              <td>{{ item.date }}</td>
              <td>
                <v-icon>mdi-delete-forever</v-icon>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </v-container>
  </v-content>
</template>

<script>
export default {
  data() {
    return {
      desserts: [
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",

          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        },
        {
          name: "M2",
          comments: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
          file_name: "TKNHB8.CHE",
          date: "2019-10-19 11:44:30"
        }
      ]
    };
  }
};
</script>
